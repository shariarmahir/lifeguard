{{-- Premium Doctor Portal - Advanced Modern Design --}}
@extends('layouts.app')

@section('title', 'Premium Doctor Portal - Shifa Healthcare')

@section('description', 'Advanced premium doctor portal for managing patients, appointments, telemedicine, and AI-powered healthcare services.')
@section('keywords', 'premium doctor portal, telemedicine, healthcare management, video consultation, doctor community')
@section('og_title', 'Premium Doctor Portal - Shifa Healthcare')
@section('og_description', 'Advanced medical dashboard with premium features for healthcare professionals')
@section('og_image', asset('images/premium-doctor-portal.jpg'))
@section('twitter_title', 'Premium Doctor Portal - Shifa Healthcare')
@section('twitter_description', 'Advanced medical dashboard with premium features')
@section('twitter_image', asset('images/premium-doctor-portal-twitter.jpg'))

@section('head')
    <!-- Additional styles for premium doctor portal -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Premium Doctor Portal Custom Styles */
        .portal-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
            position: relative;
            overflow: hidden;
        }

        .portal-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 80%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(139, 92, 246, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(16, 185, 129, 0.05) 0%, transparent 50%);
            z-index: 1;
        }

        .portal-wrapper {
            position: relative;
            z-index: 2;
        }

        /* Premium Sidebar */
        .sidebar-premium {
            background: linear-gradient(180deg, rgba(30, 58, 138, 0.95) 0%, rgba(37, 99, 235, 0.9) 100%);
            color: white;
            min-height: 100vh;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 5px 0 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--blue-500), var(--purple-500), var(--violet-500));
            border-radius: 0 0 2px 2px;
        }

        /* Premium Navigation */
        .nav-item-premium {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            border-radius: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin: 0.5rem 1rem;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .nav-item-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            transition: width 0.3s ease;
        }

        .nav-item-premium:hover {
            color: white;
            transform: translateX(10px);
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
        }

        .nav-item-premium:hover::before {
            width: 100%;
        }

        .nav-item-premium.active {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.4), rgba(37, 99, 235, 0.3));
            color: white;
            border-left: 4px solid #3b82f6;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
        }

        .nav-icon-premium {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 0.75rem;
            padding: 0.5rem;
        }

        /* Premium Main Content */
        .main-content-premium {
            flex: 1;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(10px);
            border-left: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Premium Dashboard Cards */
        .dashboard-card-premium {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            border-radius: 2rem;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .dashboard-card-premium:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.3);
            border-color: rgba(59, 130, 246, 0.3);
        }

        /* Premium Stat Cards */
        .stat-card-premium {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.9), rgba(37, 99, 235, 0.8));
            color: white;
            border-radius: 1.5rem;
            padding: 2rem;
            min-height: 160px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 15px 40px rgba(37, 99, 235, 0.3);
            position: relative;
            overflow: hidden;
        }

        .stat-card-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .stat-card-premium:hover::before {
            left: 100%;
        }

        .stat-card-premium.green {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.9), rgba(5, 150, 105, 0.8));
            box-shadow: 0 15px 40px rgba(16, 185, 129, 0.3);
        }

        .stat-card-premium.purple {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.9), rgba(124, 58, 237, 0.8));
            box-shadow: 0 15px 40px rgba(139, 92, 246, 0.3);
        }

        .stat-card-premium.orange {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.9), rgba(217, 119, 6, 0.8));
            box-shadow: 0 15px 40px rgba(245, 158, 11, 0.3);
        }

        .stat-number-premium {
            font-size: 3rem;
            font-weight: 900;
            line-height: 1;
            background: linear-gradient(135deg, white, #e2e8f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Premium Doctor Cards */
        .doctor-card-premium {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            border-radius: 1.5rem;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .doctor-card-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--blue-500), var(--purple-500));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .doctor-card-premium:hover {
            transform: translateY(-5px);
            border-color: rgba(59, 130, 246, 0.3);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }

        .doctor-card-premium:hover::before {
            opacity: 1;
        }

        .doctor-avatar-premium {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(59, 130, 246, 0.3);
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.3);
        }

        .online-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 0 15px #10b981;
            animation: pulse 2s infinite;
        }

        /* Premium Service Cards */
        .service-card-premium {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            border-radius: 1.5rem;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .service-card-premium::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: rotate(45deg);
            transition: transform 0.6s ease;
        }

        .service-card-premium:hover::after {
            transform: rotate(45deg) translate(20%, 20%);
        }

        .service-icon-premium {
            width: 70px;
            height: 70px;
            border-radius: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            background: linear-gradient(135deg, var(--blue-500), var(--purple-500));
            color: white;
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.3);
        }

        .service-price {
            font-size: 2rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--blue-500), var(--purple-500));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 1rem 0;
        }

        /* Premium Community Section */
        .community-card-premium {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(124, 58, 237, 0.05));
            border-radius: 2rem;
            padding: 2.5rem;
            border: 1px solid rgba(139, 92, 246, 0.2);
            position: relative;
            overflow: hidden;
        }

        .community-card-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--purple-500), var(--violet-500));
        }

        /* Premium Emergency Card */
        .emergency-card-premium {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.05));
            border-radius: 2rem;
            padding: 2.5rem;
            border: 1px solid rgba(239, 68, 68, 0.2);
            position: relative;
            overflow: hidden;
        }

        .emergency-card-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #ef4444, #dc2626);
        }

        /* Premium Button Styles */
        .btn-request-premium {
            background: linear-gradient(135deg, var(--blue-500), var(--purple-500));
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.3);
        }

        .btn-request-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-request-premium:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(37, 99, 235, 0.4);
        }

        .btn-request-premium:hover::before {
            left: 100%;
        }

        .btn-request-premium.emergency {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            box-shadow: 0 10px 30px rgba(239, 68, 68, 0.3);
        }

        .btn-request-premium.emergency:hover {
            box-shadow: 0 15px 40px rgba(239, 68, 68, 0.4);
        }

        /* Premium Call Action Buttons */
        .call-action-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            border: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .call-action-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), transparent);
            border-radius: 50%;
        }

        .call-action-btn:hover {
            transform: scale(1.1) translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        .call-action-btn.audio {
            background: linear-gradient(135deg, var(--blue-500), var(--blue-600));
        }

        .call-action-btn.video {
            background: linear-gradient(135deg, var(--purple-500), var(--purple-600));
        }

        .call-action-btn.message {
            background: linear-gradient(135deg, var(--green-500), var(--green-600));
        }

        /* Premium Rating Stars */
        .rating-stars-premium {
            display: flex;
            gap: 0.25rem;
        }

        .star-premium {
            color: #fbbf24;
            text-shadow: 0 0 10px rgba(251, 191, 36, 0.5);
        }

        .star-premium.filled {
            text-shadow: 0 0 15px rgba(251, 191, 36, 0.8);
        }

        /* Premium Chat Window */
        .chat-window-premium {
            height: 500px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.02));
            border-radius: 2rem;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(20px);
        }

        /* Premium Search Input */
        .search-input-premium {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
            padding: 1rem 1.5rem 1rem 3.5rem;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        .search-input-premium:focus {
            outline: none;
            border-color: var(--blue-500);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            background: rgba(255, 255, 255, 0.08);
        }

        /* Premium Animations */
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            }
            50% {
                box-shadow: 0 0 40px rgba(59, 130, 246, 0.6);
            }
        }

        /* Floating Elements */
        .floating-element {
            animation: float 3s ease-in-out infinite;
        }

        .glowing-element {
            animation: glow 2s ease-in-out infinite;
        }

        /* Premium Scrollbar */
        .premium-scrollbar::-webkit-scrollbar {
            width: 8px;
        }

        .premium-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 4px;
        }

        .premium-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--blue-500), var(--purple-500));
            border-radius: 4px;
        }

        .premium-scrollbar::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, var(--blue-600), var(--purple-600));
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .sidebar-premium {
                width: 280px;
                position: fixed;
                left: -280px;
                z-index: 1000;
            }

            .sidebar-premium.mobile-open {
                left: 0;
                box-shadow: 10px 0 50px rgba(0, 0, 0, 0.4);
            }

            .main-content-premium {
                padding: 1.5rem;
            }

            .stat-number-premium {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .dashboard-card-premium {
                padding: 1.5rem;
            }

            .stat-card-premium {
                padding: 1.5rem;
                min-height: 140px;
            }

            .service-card-premium {
                padding: 1.5rem;
            }

            .doctor-avatar-premium {
                width: 60px;
                height: 60px;
            }
        }

        @media (max-width: 640px) {
            .main-content-premium {
                padding: 1rem;
            }

            .dashboard-card-premium {
                padding: 1rem;
                border-radius: 1.5rem;
            }

            .stat-number-premium {
                font-size: 2rem;
            }

            .call-action-btn {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
            }
        }

        /* Glass Effect Enhancement */
        .glass-effect-premium {
            backdrop-filter: blur(20px);
            background: linear-gradient(135deg,
                rgba(255, 255, 255, 0.1) 0%,
                rgba(255, 255, 255, 0.05) 50%,
                rgba(255, 255, 255, 0.02) 100%);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        /* Gradient Text */
        .text-gradient-premium {
            background: linear-gradient(135deg, var(--blue-500) 0%, var(--purple-500) 50%, var(--violet-500) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 200% 200%;
            animation: gradient-shift 3s ease infinite;
        }

        /* Premium Notification Badge */
        .notification-badge-premium {
            position: absolute;
            top: -5px;
            right: -5px;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.5);
            animation: glow 1.5s ease-in-out infinite;
        }
    </style>
@endsection

@section('content')
<div x-data="premiumDoctorPortal()" class="portal-container flex" :class="{ 'sidebar-collapsed': collapsed }">
    <!-- Premium Sidebar Navigation -->
    <div class="sidebar-premium w-80 flex-shrink-0" :class="mobileMenuOpen ? 'mobile-open' : ''">
        <div class="p-6 h-full flex flex-col">
            <!-- Premium Doctor Profile -->
            <div class="flex items-center mb-8 p-4 rounded-2xl glass-effect-premium" data-aos="fade-down">
                <img src="{{ asset('images/doctor-avatar-premium.jpg') }}" alt="Doctor Avatar"
                     class="doctor-avatar-premium mr-4 glowing-element">
                <div>
                    <h3 class="font-bold text-xl text-white">Dr. Ayesha Rahman</h3>
                    <p class="text-sm opacity-90">Cardiologist & Head of Department</p>
                    <div class="flex items-center mt-2">
                        <div class="w-3 h-3 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full mr-2 glow"></div>
                        <span class="text-xs font-semibold text-green-300">● ONLINE NOW</span>
                    </div>
                </div>
            </div>

            <!-- Premium Navigation -->
            <nav class="flex-1 space-y-1">
                <a href="#dashboard" @click="setActive('dashboard')"
                   class="nav-item-premium" :class="{ 'active': activeTab === 'dashboard' }" data-aos="fade-right" data-aos-delay="100">
                    <div class="nav-icon-premium">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <span class="font-semibold">Dashboard</span>
                    <span class="ml-auto text-xs opacity-70">Ctrl+1</span>
                </a>

                <a href="#onboard-doctors" @click="setActive('onboard-doctors')"
                   class="nav-item-premium" :class="{ 'active': activeTab === 'onboard-doctors' }" data-aos="fade-right" data-aos-delay="150">
                    <div class="nav-icon-premium relative">
                        <i class="fas fa-user-md"></i>
                        <span x-show="newDoctors > 0" class="notification-badge-premium">{{ $newDoctors ?? 5 }}</span>
                    </div>
                    <span class="font-semibold">Live Doctors</span>
                    <span x-show="newDoctors > 0"
                          class="ml-auto bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs rounded-full px-2 py-1 font-bold">
                        {{ $newDoctors ?? 5 }} NEW
                    </span>
                </a>

                <a href="#telemedicine" @click="setActive('telemedicine')"
                   class="nav-item-premium" :class="{ 'active': activeTab === 'telemedicine' }" data-aos="fade-right" data-aos-delay="200">
                    <div class="nav-icon-premium">
                        <i class="fas fa-video"></i>
                    </div>
                    <span class="font-semibold">Telemedicine</span>
                    <span class="ml-auto text-xs bg-gradient-to-r from-blue-500 to-purple-500 text-transparent bg-clip-text">PREMIUM</span>
                </a>

                <a href="#community" @click="setActive('community')"
                   class="nav-item-premium" :class="{ 'active': activeTab === 'community' }" data-aos="fade-right" data-aos-delay="250">
                    <div class="nav-icon-premium">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="font-semibold">Doctor Community</span>
                    <span class="ml-auto text-xs opacity-70">HOT</span>
                </a>

                <a href="#emergency" @click="setActive('emergency')"
                   class="nav-item-premium" :class="{ 'active': activeTab === 'emergency' }" data-aos="fade-right" data-aos-delay="300">
                    <div class="nav-icon-premium relative">
                        <i class="fas fa-ambulance"></i>
                        <span x-show="emergencyRequests > 0" class="notification-badge-premium">{{ $emergencyRequests ?? 2 }}</span>
                    </div>
                    <span class="font-semibold">Emergency Services</span>
                    <span x-show="emergencyRequests > 0"
                          class="ml-auto bg-gradient-to-r from-red-600 to-orange-500 text-white text-xs rounded-full px-2 py-1 font-bold animate-pulse">
                        URGENT
                    </span>
                </a>

                <a href="#premium-services" @click="setActive('premium-services')"
                   class="nav-item-premium" :class="{ 'active': activeTab === 'premium-services' }" data-aos="fade-right" data-aos-delay="350">
                    <div class="nav-icon-premium">
                        <i class="fas fa-crown"></i>
                    </div>
                    <span class="font-semibold">Premium Services</span>
                    <span class="ml-auto text-xs bg-gradient-to-r from-yellow-500 to-orange-500 text-transparent bg-clip-text">EXCLUSIVE</span>
                </a>

                <a href="#analytics" @click="setActive('analytics')"
                   class="nav-item-premium" :class="{ 'active': activeTab === 'analytics' }" data-aos="fade-right" data-aos-delay="400">
                    <div class="nav-icon-premium">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <span class="font-semibold">AI Analytics</span>
                </a>

                <a href="#revenue" @click="setActive('revenue')"
                   class="nav-item-premium" :class="{ 'active': activeTab === 'revenue' }" data-aos="fade-right" data-aos-delay="450">
                    <div class="nav-icon-premium">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <span class="font-semibold">Revenue Dashboard</span>
                </a>
            </nav>

            <!-- Premium Quick Stats -->
            <div class="mt-8 pt-8 border-t border-white/10">
                <div class="grid grid-cols-2 gap-3">
                    <div class="text-center p-3 rounded-xl bg-gradient-to-br from-blue-500/20 to-transparent">
                        <div class="text-2xl font-bold text-white">৳12,540</div>
                        <div class="text-xs opacity-70">Today's Revenue</div>
                    </div>
                    <div class="text-center p-3 rounded-xl bg-gradient-to-br from-green-500/20 to-transparent">
                        <div class="text-2xl font-bold text-white">28</div>
                        <div class="text-xs opacity-70">Consultations</div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Toggle -->
            <button @click="toggleSidebar()"
                    class="absolute -right-3 top-6 bg-gradient-to-r from-blue-600 to-purple-600 text-white w-8 h-8 rounded-full shadow-xl flex items-center justify-center hover:shadow-2xl transition-all duration-300 z-10">
                <i class="fas text-sm" :class="collapsed ? 'fa-chevron-right' : 'fa-chevron-left'"></i>
            </button>
        </div>
    </div>

    <!-- Premium Main Content -->
    <div class="main-content-premium flex-1 overflow-y-auto premium-scrollbar">
        <!-- Premium Top Bar -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold text-white mb-2" x-text="getActiveTabTitle()"></h1>
                <p class="text-gray-300" x-text="getActiveTabSubtitle()"></p>
            </div>

            <div class="flex items-center space-x-4">
                <!-- Premium Search -->
                <div class="relative w-96">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text"
                           placeholder="Search doctors, patients, medical records..."
                           class="search-input-premium">
                </div>

                <!-- Premium Notifications -->
                <div class="relative">
                    <button @click="toggleNotifications()"
                            class="w-12 h-12 rounded-full glass-effect-premium flex items-center justify-center hover:shadow-xl transition-all duration-300 relative">
                        <i class="fas fa-bell text-xl text-blue-300"></i>
                        <span x-show="unreadNotifications > 0"
                              class="notification-badge-premium">{{ $unreadNotifications ?? 8 }}</span>
                    </button>
                </div>

                <!-- Mobile Menu Toggle -->
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="lg:hidden w-12 h-12 rounded-full bg-gradient-to-r from-blue-600 to-purple-600 text-white flex items-center justify-center shadow-xl hover:shadow-2xl transition-all">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>

        <!-- Dashboard Tab -->
        <div x-show="activeTab === 'dashboard'" class="space-y-8">
            <!-- Premium Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="stat-card-premium" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm opacity-90 mb-2">TODAY'S CONSULTATIONS</p>
                            <h2 class="stat-number-premium">12</h2>
                        </div>
                        <i class="fas fa-video text-3xl opacity-60"></i>
                    </div>
                    <p class="text-xs mt-4 opacity-80 flex items-center">
                        <i class="fas fa-arrow-up text-green-400 mr-2"></i>
                        20% increase from yesterday
                    </p>
                </div>

                <div class="stat-card-premium green" data-aos="fade-up" data-aos-delay="150">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm opacity-90 mb-2">TOTAL REVENUE</p>
                            <h2 class="stat-number-premium">৳12,540</h2>
                        </div>
                        <i class="fas fa-wallet text-3xl opacity-60"></i>
                    </div>
                    <p class="text-xs mt-4 opacity-80 flex items-center">
                        <i class="fas fa-chart-line text-emerald-400 mr-2"></i>
                        ৳3,240 from video calls
                    </p>
                </div>

                <div class="stat-card-premium purple" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm opacity-90 mb-2">ACTIVE PATIENTS</p>
                            <h2 class="stat-number-premium">148</h2>
                        </div>
                        <i class="fas fa-user-injured text-3xl opacity-60"></i>
                    </div>
                    <p class="text-xs mt-4 opacity-80 flex items-center">
                        <i class="fas fa-user-plus text-purple-400 mr-2"></i>
                        5 new this week
                    </p>
                </div>

                <div class="stat-card-premium orange" data-aos="fade-up" data-aos-delay="250">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm opacity-90 mb-2">AVG. WAIT TIME</p>
                            <h2 class="stat-number-premium">15m</h2>
                        </div>
                        <i class="fas fa-clock text-3xl opacity-60"></i>
                    </div>
                    <p class="text-xs mt-4 opacity-80 flex items-center">
                        <i class="fas fa-arrow-down text-amber-400 mr-2"></i>
                        5m below average
                    </p>
                </div>
            </div>

            <!-- Live Doctors Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Live Doctors Card -->
                <div class="dashboard-card-premium lg:col-span-2" data-aos="fade-up">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2">Live Doctors Online</h3>
                            <p class="text-gray-300">Real-time availability of healthcare professionals</p>
                        </div>
                        <a href="#onboard-doctors" @click="setActive('onboard-doctors')"
                           class="btn-request-premium text-sm px-4 py-2">
                            View All <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        @foreach([
                            ['name' => 'Dr. Rahman Ahmed', 'spec' => 'Cardiologist', 'rating' => 4.9, 'price' => '৳100/200'],
                            ['name' => 'Dr. Fatima Begum', 'spec' => 'Pediatrician', 'rating' => 4.8, 'price' => '৳80/150'],
                            ['name' => 'Dr. Karim Hossain', 'spec' => 'Neurologist', 'rating' => 4.7, 'price' => '৳120/250'],
                            ['name' => 'Dr. Sofia Akter', 'spec' => 'Gynecologist', 'rating' => 4.9, 'price' => '৳90/180']
                        ] as $doctor)
                        <div class="doctor-card-premium" data-aos="zoom-in">
                            <div class="relative">
                                <div class="online-badge"></div>
                                <img src="{{ asset('images/doctor-' . $loop->iteration . '.jpg') }}"
                                     alt="{{ $doctor['name'] }}" class="doctor-avatar-premium mx-auto mb-4">
                            </div>
                            <h4 class="text-lg font-bold text-white text-center mb-1">{{ $doctor['name'] }}</h4>
                            <p class="text-sm text-gray-300 text-center mb-2">{{ $doctor['spec'] }}</p>

                            <div class="flex justify-center items-center mb-3">
                                <div class="rating-stars-premium">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star star-premium {{ $i <= round($doctor['rating']) ? 'filled' : '' }}"></i>
                                    @endfor
                                </div>
                                <span class="text-sm text-amber-400 ml-2 font-bold">{{ $doctor['rating'] }}</span>
                            </div>

                            <div class="text-center mb-4">
                                <span class="text-xs text-gray-400">Audio/Video: </span>
                                <span class="text-sm font-bold text-gradient-premium">{{ $doctor['price'] }}</span>
                            </div>

                            <div class="flex justify-center space-x-3">
                                <button class="call-action-btn audio" title="Audio Call (৳100)">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="call-action-btn video" title="Video Call (৳200)">
                                    <i class="fas fa-video"></i>
                                </button>
                                <button class="call-action-btn message" title="Message">
                                    <i class="fas fa-comment-medical"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Premium Services Quick Access -->
                <div class="dashboard-card-premium" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-2xl font-bold text-white mb-6">Premium Services</h3>

                    <div class="space-y-4">
                        <div class="service-card-premium" data-aos="zoom-in">
                            <div class="service-icon-premium">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <h4 class="text-xl font-bold text-white mb-2">Long-term Assessment</h4>
                            <p class="text-gray-300 text-sm mb-4">Personalized healthcare monitoring</p>
                            <button class="btn-request-premium w-full">
                                Request Service
                            </button>
                        </div>

                        <div class="service-card-premium" data-aos="zoom-in" data-aos-delay="100">
                            <div class="service-icon-premium bg-gradient-to-r from-purple-500 to-pink-500">
                                <i class="fas fa-ambulance"></i>
                            </div>
                            <h4 class="text-xl font-bold text-white mb-2">Emergency Home Care</h4>
                            <p class="text-gray-300 text-sm mb-4">24/7 emergency medical service</p>
                            <button class="btn-request-premium emergency w-full">
                                Emergency Request
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Doctor Community & Analytics -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Doctor Community -->
                <div class="community-card-premium" data-aos="fade-right">
                    <h3 class="text-2xl font-bold text-white mb-6">Doctor Community</h3>
                    <p class="text-gray-300 mb-6">Join discussions about medical technology, risk management, and advanced treatments</p>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 rounded-xl bg-white/5 hover:bg-white/10 transition-colors cursor-pointer">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 flex items-center justify-center">
                                    <i class="fas fa-brain text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white">AI in Cardiology</h4>
                                    <p class="text-sm text-gray-400">Dr. Rahman Ahmed • 45 participants</p>
                                </div>
                            </div>
                            <span class="text-xs bg-gradient-to-r from-blue-500 to-purple-500 text-white px-3 py-1 rounded-full">LIVE</span>
                        </div>

                        <div class="flex items-center justify-between p-4 rounded-xl bg-white/5 hover:bg-white/10 transition-colors cursor-pointer">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-green-500 to-emerald-500 flex items-center justify-center">
                                    <i class="fas fa-shield-virus text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white">Pandemic Preparedness</h4>
                                    <p class="text-sm text-gray-400">Dr. Fatima Begum • 32 participants</p>
                                </div>
                            </div>
                            <span class="text-xs bg-gradient-to-r from-green-500 to-emerald-500 text-white px-3 py-1 rounded-full">ACTIVE</span>
                        </div>
                    </div>

                    <button @click="joinCommunity()" class="btn-request-premium w-full mt-6">
                        <i class="fas fa-users mr-2"></i> Join Community Discussion
                    </button>
                </div>

                <!-- Revenue Analytics -->
                <div class="dashboard-card-premium" data-aos="fade-left">
                    <h3 class="text-2xl font-bold text-white mb-6">Revenue Analytics</h3>

                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-300">Audio Consultations</span>
                                <span class="font-bold text-white">৳4,200</span>
                            </div>
                            <div class="h-2 bg-gray-700 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full" style="width: 70%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-300">Video Consultations</span>
                                <span class="font-bold text-white">৳8,340</span>
                            </div>
                            <div class="h-2 bg-gray-700 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-purple-500 to-pink-500 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-300">Emergency Services</span>
                                <span class="font-bold text-white">৳3,500</span>
                            </div>
                            <div class="h-2 bg-gray-700 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-red-500 to-orange-500 rounded-full" style="width: 55%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Onboard Doctors Tab -->
        <div x-show="activeTab === 'onboard-doctors'" class="space-y-8" data-aos="fade-up">
            <div class="dashboard-card-premium">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h3 class="text-3xl font-bold text-white mb-2">Live Doctors Network</h3>
                        <p class="text-gray-300">Connect with healthcare professionals in real-time</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <div class="w-3 h-3 bg-green-500 rounded-full animate-ping absolute"></div>
                            <div class="w-3 h-3 bg-green-500 rounded-full relative"></div>
                        </div>
                        <span class="text-green-400 font-bold">24 Doctors Online</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach([
                        ['name' => 'Dr. Rahman Ahmed', 'spec' => 'Cardiologist', 'rating' => 4.9, 'exp' => '15 years', 'audio' => '৳100', 'video' => '৳200'],
                        ['name' => 'Dr. Fatima Begum', 'spec' => 'Pediatrician', 'rating' => 4.8, 'exp' => '12 years', 'audio' => '৳80', 'video' => '৳150'],
                        ['name' => 'Dr. Karim Hossain', 'spec' => 'Neurologist', 'rating' => 4.7, 'exp' => '18 years', 'audio' => '৳120', 'video' => '৳250'],
                        ['name' => 'Dr. Sofia Akter', 'spec' => 'Gynecologist', 'rating' => 4.9, 'exp' => '10 years', 'audio' => '৳90', 'video' => '৳180'],
                        ['name' => 'Dr. Mahmud Hasan', 'spec' => 'Orthopedic', 'rating' => 4.6, 'exp' => '20 years', 'audio' => '৳110', 'video' => '৳220'],
                        ['name' => 'Dr. Nusrat Jahan', 'spec' => 'Dermatologist', 'rating' => 4.8, 'exp' => '8 years', 'audio' => '৳95', 'video' => '৳190']
                    ] as $doctor)
                    <div class="doctor-card-premium" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="flex items-center mb-4">
                            <img src="{{ asset('images/doctor-' . ($loop->iteration % 4 + 1) . '.jpg') }}"
                                 alt="{{ $doctor['name'] }}" class="doctor-avatar-premium">
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-white">{{ $doctor['name'] }}</h4>
                                <p class="text-sm text-gray-300">{{ $doctor['spec'] }}</p>
                                <div class="flex items-center mt-1">
                                    <div class="rating-stars-premium">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star star-premium {{ $i <= round($doctor['rating']) ? 'filled' : '' }}"></i>
                                        @endfor
                                    </div>
                                    <span class="text-sm text-amber-400 ml-2 font-bold">{{ $doctor['rating'] }}</span>
                                </div>
                            </div>
                            <div class="online-badge"></div>
                        </div>

                        <div class="space-y-3">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Experience:</span>
                                <span class="text-white font-semibold">{{ $doctor['exp'] }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Audio Call:</span>
                                <span class="text-green-400 font-bold">{{ $doctor['audio'] }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Video Call:</span>
                                <span class="text-purple-400 font-bold">{{ $doctor['video'] }}</span>
                            </div>
                        </div>

                        <div class="flex justify-between mt-6">
                            <button class="call-action-btn audio" title="Audio Call">
                                <i class="fas fa-phone"></i>
                            </button>
                            <button class="call-action-btn video" title="Video Call">
                                <i class="fas fa-video"></i>
                            </button>
                            <button class="call-action-btn message" title="Message">
                                <i class="fas fa-comment-medical"></i>
                            </button>
                            <button class="btn-request-premium text-xs px-3 py-2">
                                <i class="fas fa-user-plus mr-1"></i> Follow
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Other tabs content... -->
        <!-- (Telemedicine, Community, Emergency, Premium Services tabs would follow similar premium structure) -->

    </div>
</div>
@endsection

@section('scripts')
<!-- AOS Animation Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
// Initialize AOS
AOS.init({
    duration: 800,
    once: false,
    mirror: true
});

document.addEventListener('alpine:init', () => {
    Alpine.data('premiumDoctorPortal', () => ({
        activeTab: 'dashboard',
        collapsed: false,
        mobileMenuOpen: false,
        showNotifications: false,
        unreadNotifications: 8,
        emergencyRequests: 2,
        newDoctors: 5,
        unreadMessages: 12,

        init() {
            console.log('Premium Doctor Portal Initialized');
            this.setupEventListeners();
            this.initializePortalFeatures();

            // Auto-refresh doctors online status
            this.startLiveUpdates();
        },

        setActive(tab) {
            this.activeTab = tab;
            this.mobileMenuOpen = false;

            // Smooth scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });

            // Update browser history
            history.pushState(null, null, `#${tab}`);
        },

        toggleSidebar() {
            this.collapsed = !this.collapsed;
            window.dispatchEvent(new Event('resize'));
        },

        toggleNotifications() {
            this.showNotifications = !this.showNotifications;
            if (this.showNotifications) {
                this.unreadNotifications = 0;
                this.showGlobalNotification('Notifications cleared', 'success');
            }
        },

        getActiveTabTitle() {
            const titles = {
                'dashboard': 'Premium Dashboard',
                'onboard-doctors': 'Live Doctors Network',
                'telemedicine': 'Telemedicine Suite',
                'community': 'Doctor Community',
                'emergency': 'Emergency Services',
                'premium-services': 'Premium Healthcare',
                'analytics': 'AI Analytics',
                'revenue': 'Revenue Dashboard'
            };
            return titles[this.activeTab] || 'Premium Portal';
        },

        getActiveTabSubtitle() {
            const subtitles = {
                'dashboard': 'Welcome to your premium healthcare command center',
                'onboard-doctors': 'Real-time connection with healthcare professionals',
                'telemedicine': 'Advanced virtual healthcare platform',
                'community': 'Collaborate with medical experts worldwide',
                'emergency': '24/7 emergency medical response system',
                'premium-services': 'Exclusive healthcare services & monitoring',
                'analytics': 'AI-powered insights and predictions',
                'revenue': 'Track earnings and financial analytics'
            };
            return subtitles[this.activeTab] || '';
        },

        joinCommunity() {
            this.showGlobalNotification('Joining Doctor Community Discussion...', 'info');
            this.setActive('community');
        },

        startAudioCall(doctorName, price) {
            this.showGlobalNotification(`Initiating audio call with ${doctorName} for ${price}`, 'info');
            // Implementation for audio call
        },

        startVideoCall(doctorName, price) {
            this.showGlobalNotification(`Initiating video consultation with ${doctorName} for ${price}`, 'success');
            // Implementation for video call
        },

        sendMessage(doctorName) {
            this.showGlobalNotification(`Opening chat with ${doctorName}`, 'info');
            this.setActive('chat');
        },

        requestEmergency() {
            if (confirm('Are you sure you want to request emergency medical service?')) {
                this.showGlobalNotification('Emergency medical team has been dispatched!', 'success');
                this.emergencyRequests++;
            }
        },

        requestLongTermService() {
            this.showGlobalNotification('Opening long-term service request form...', 'info');
            this.setActive('premium-services');
        },

        showGlobalNotification(message, type = 'info') {
            if (window.ShifaHealthcare && window.ShifaHealthcare.showGlobalNotification) {
                window.ShifaHealthcare.showGlobalNotification(message, type);
            } else {
                // Fallback notification
                const notification = document.createElement('div');
                notification.className = `fixed top-4 right-4 z-50 max-w-md p-4 rounded-lg shadow-lg transform transition-all duration-300`;
                notification.innerHTML = `<div class="text-white">${message}</div>`;
                document.body.appendChild(notification);
                setTimeout(() => notification.remove(), 3000);
            }
        },

        setupEventListeners() {
            // Handle browser back/forward buttons
            window.addEventListener('popstate', () => {
                const hash = window.location.hash.replace('#', '');
                if (hash && this.activeTab !== hash) {
                    this.activeTab = hash;
                }
            });

            // Keyboard shortcuts for premium features
            document.addEventListener('keydown', (e) => {
                // Ctrl+1 to 9 for tabs
                if (e.ctrlKey && e.key >= '1' && e.key <= '9') {
                    e.preventDefault();
                    const tabs = ['dashboard', 'onboard-doctors', 'telemedicine', 'community',
                                'emergency', 'premium-services', 'analytics', 'revenue'];
                    const index = parseInt(e.key) - 1;
                    if (tabs[index]) {
                        this.setActive(tabs[index]);
                    }
                }

                // Quick actions
                if (e.key === 'E' && e.ctrlKey) {
                    e.preventDefault();
                    this.requestEmergency();
                }

                if (e.key === 'C' && e.ctrlKey) {
                    e.preventDefault();
                    this.joinCommunity();
                }
            });
        },

        initializePortalFeatures() {
            // Initialize any portal-specific features
            console.log('Premium features initialized');
        },

        startLiveUpdates() {
            // Simulate live updates for doctors online status
            setInterval(() => {
                // This would typically fetch from an API
                this.newDoctors = Math.floor(Math.random() * 3) + 1;
            }, 30000); // Every 30 seconds
        }
    }));
});
</script>
@endsection
