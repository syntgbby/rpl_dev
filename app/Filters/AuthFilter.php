<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Cek apakah user sudah login
        if (!$session->get('isLoggedIn')) {
            // Redirect ke halaman login
            return redirect()->to('/login');
        }

        // Jika ada pengecekan role
        if ($arguments && !in_array($session->get('role'), $arguments)) {
            // Jika tidak punya role yang dibutuhkan, tolak akses
            return redirect()->to('/unauthorized'); // Buat route ini sesuai kebutuhan
        }

        // Kalau lolos, lanjutkan ke controller
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu melakukan apa-apa setelah
    }
}
