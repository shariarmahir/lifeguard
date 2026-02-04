<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home.index');
})->name('home');


// Add this simple route to your routes/web.php file

 Route::get('/womens-health-dashboard', function () {
 return view('womens-health.dashboard');
 });

Route::get('/womens-health/dashboard', function () {
    return view('womens-health.dashboard');
})->name('womens-health.dashboard');


Route::get('/dashboard/lifestream', function () {
    return view('dashboard.lifestream');
})->name('dashboard.lifestream');

// Doctor Portal Route
// Route::get('/doctor/portal', function () {
//     return view('doctor.portal');
// })->name('doctor.portal');

// Premium Doctor Portal Route
Route::get('/doctor/portal', function () {
    // Sample premium data
    $premiumData = [
        'doctor' => [
            'name' => 'Dr. Ayesha Rahman',
            'specialization' => 'Cardiologist & Head of Department',
            'rating' => 4.9,
            'experience' => '15 years',
            'consultations' => 1248,
            'revenue_today' => '৳12,540',
            'online' => true
        ],
        'live_doctors' => 24,
        'new_doctors' => 5,
        'emergency_requests' => 2,
        'community_discussions' => 8,
        'premium_services' => [
            'Long-term Assessment' => 'Personalized healthcare monitoring',
            'Emergency Home Care' => '24/7 emergency medical service',
            'AI Health Analytics' => 'Advanced predictive analysis',
            'Medical Tech Forum' => 'Access to latest medical technology'
        ]
    ];

    return view('doctor.portal', $premiumData);
})->name('doctor.portal.premium');

// Protected route (if using authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/doctor/premium-portal', function () {
        return view('doctor.portal');
    })->name('doctor.premium');
});
