<?php 
use Config\Services; 
if (!function_exists('kirimEmail')) { 
    function kirimEmail(array $data) 
    { 
        $email = Services::email(); // Kamu bisa load konfigurasi dari .env atau set manual 
        $email->initialize(config('Email')); // menggunakan config/email.php atau .env 
        
        // Isi default 
        $from = env('email.from') ?? 'noreply@example.com'; 
        $fromName = env('email.fromName') ?? 'Example'; 
        $to = $data['to'] ?? null; 
        $subject = $data['subject'] ?? '(No Subject)'; 
        $message = $data['message'] ?? ''; 
        $email->setFrom($from, $fromName); 
        $email->setTo($to); 
        $email->setSubject($subject); 
        $email->setMessage($message); 

        if (isset($data['cc'])) 
        { 
            $email->setCC($data['cc']); 
        } 
        
        if (isset($data['bcc'])) 
        { 
            $email->setBCC($data['bcc']); 
        } 
        
        if (isset($data['attachment'])) 
        { 
            $email->attach($data['attachment']); 
        } 
        
        if ($email->send()) 
        { 
            return true; 
        } else { 
            log_message('error', 'Email failed: ' . $email->printDebugger(['headers']));
            return false;
        }
    }
}
