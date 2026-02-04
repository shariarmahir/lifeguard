@extends('layouts.app')

@section('title', 'Live Doctor Portal')

@section('description', 'Connect with expert doctors instantly through audio, video, or text consultation. Available 24/7 for your healthcare needs.')

@push('head')
<style>
    /* Premium Doctor Portal Styles */
    .doctor-portal-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 25%, #334155 50%, #475569 75%, #64748b 100%);
        position: relative;
        overflow: hidden;
    }

    .doctor-portal-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        opacity: 0.3;
    }

    .doctor-card-premium {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.9) 100%);
        backdrop-filter: blur(20px);
        border-radius: 1.5rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .doctor-card-premium::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .doctor-card-premium:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.2);
    }

    .doctor-card-premium:hover::before {
        left: 100%;
    }

    .online-indicator {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
    }

    .doctor-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        object-fit: cover;
    }

    .specialty-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        border-radius: 1rem;
        font-size: 0.875rem;
        font-weight: 600;
        color: #1e40af;
    }

    .rating-stars {
        display: flex;
        gap: 0.25rem;
    }

    .rating-star {
        color: #fbbf24;
        font-size: 1.25rem;
    }

    .consultation-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        font-weight: 700;
        border-radius: 1rem;
        transition: all 0.3s ease;
        font-size: 0.875rem;
        border: none;
        cursor: pointer;
    }

    .consultation-btn-audio {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
    }

    .consultation-btn-audio:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(16, 185, 129, 0.4);
    }

    .consultation-btn-video {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
    }

    .consultation-btn-video:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(59, 130, 246, 0.4);
    }

    .consultation-btn-text {
        background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
        color: white;
        box-shadow: 0 8px 20px rgba(139, 92, 246, 0.3);
    }

    .consultation-btn-text:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(139, 92, 246, 0.4);
    }

    .filter-section {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.9) 100%);
        backdrop-filter: blur(20px);
        border-radius: 1.5rem;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }

    .emergency-banner {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        border-radius: 1.5rem;
        padding: 2rem;
        color: white;
        box-shadow: 0 20px 60px rgba(220, 38, 38, 0.3);
        position: relative;
        overflow: hidden;
    }

    .emergency-banner::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        animation: emergency-pulse 3s ease-in-out infinite;
    }

    @keyframes emergency-pulse {
        0%, 100% {
            transform: scale(1);
            opacity: 1;
        }
        50% {
            transform: scale(1.2);
            opacity: 0.5;
        }
    }

    .community-card {
        background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
        border-radius: 1.5rem;
        padding: 2rem;
        border: 1px solid rgba(139, 92, 246, 0.2);
        transition: all 0.3s ease;
    }

    .community-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(139, 92, 246, 0.2);
    }

    .premium-service-card {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        border-radius: 1.5rem;
        padding: 2rem;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .premium-service-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(139, 92, 246, 0.3) 0%, transparent 70%);
    }

    .stats-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: rgba(59, 130, 246, 0.1);
        border-radius: 0.75rem;
        font-size: 0.875rem;
        font-weight: 600;
        color: #1e40af;
    }

    .filter-btn {
        padding: 0.75rem 1.5rem;
        background: white;
        border: 2px solid #e5e7eb;
        border-radius: 1rem;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .filter-btn:hover, .filter-btn.active {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        border-color: transparent;
        transform: translateY(-2px);
    }

    .live-indicator-dot {
        width: 12px;
        height: 12px;
        background: #10b981;
        border-radius: 50%;
        box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
        animation: live-pulse 2s infinite;
    }

    @keyframes live-pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="doctor-portal-hero py-20 relative">
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-6 py-3 rounded-full mb-6">
                <div class="live-indicator-dot"></div>
                <span class="text-white font-bold">{{ count($doctors ?? []) }} Doctors Online Now</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-black text-white mb-6 font-vietnam">
                Connect with Expert Doctors
                <span class="block text-gradient-light mt-2">Anytime, Anywhere</span>
            </h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Get instant medical consultation through audio, video, or text with our certified healthcare professionals
            </p>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-5xl mx-auto">
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 text-center">
                <div class="text-4xl font-black text-white mb-2">24/7</div>
                <div class="text-blue-100 font-medium">Available</div>
            </div>
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 text-center">
                <div class="text-4xl font-black text-white mb-2">100+</div>
                <div class="text-blue-100 font-medium">Expert Doctors</div>
            </div>
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 text-center">
                <div class="text-4xl font-black text-white mb-2">50k+</div>
                <div class="text-blue-100 font-medium">Consultations</div>
            </div>
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 text-center">
                <div class="text-4xl font-black text-white mb-2">4.9⭐</div>
                <div class="text-blue-100 font-medium">Average Rating</div>
            </div>
        </div>
    </div>
</section>

<!-- Emergency Banner -->
<section class="container mx-auto px-4 -mt-10 relative z-20">
    <div class="emergency-banner">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 relative z-10">
            <div class="text-center md:text-left">
                <h3 class="text-3xl font-black mb-3 flex items-center justify-center md:justify-start gap-3">
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    Need Urgent Medical Help?
                </h3>
                <p class="text-lg text-red-100 mb-4">Get instant emergency consultation or request home visit within 30 minutes</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-4">
                <button onclick="#" class="btn-base bg-white text-red-600 hover:bg-red-50 px-8 py-4 text-lg whitespace-nowrap">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                    Emergency Call
                </button>
                <button onclick="#" class="btn-outline-premium bg-white border-2 border-white text-red-600 hover:bg-red-50 px-8 py-4 text-lg whitespace-nowrap">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                    </svg>
                    Home Visit
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="container mx-auto px-4 mt-16" x-data="doctorPortal()">
    <div class="filter-section">
        <div class="flex flex-col lg:flex-row gap-6 items-start lg:items-center justify-between">
            <div>
                <h3 class="text-2xl font-black text-gray-900 mb-2">Find Your Doctor</h3>
                <p class="text-gray-600">Filter by specialty, availability, or rating</p>
            </div>

            <div class="flex flex-wrap gap-3">
                <button @click="filterSpecialty = 'all'"
                        :class="{'active': filterSpecialty === 'all'}"
                        class="filter-btn">
                    All Doctors
                </button>
                <button @click="filterSpecialty = 'cardiology'"
                        :class="{'active': filterSpecialty === 'cardiology'}"
                        class="filter-btn">
                    Cardiology
                </button>
                <button @click="filterSpecialty = 'pediatrics'"
                        :class="{'active': filterSpecialty === 'pediatrics'}"
                        class="filter-btn">
                    Pediatrics
                </button>
                <button @click="filterSpecialty = 'dermatology'"
                        :class="{'active': filterSpecialty === 'dermatology'}"
                        class="filter-btn">
                    Dermatology
                </button>
                <button @click="filterSpecialty = 'neurology'"
                        :class="{'active': filterSpecialty === 'neurology'}"
                        class="filter-btn">
                    Neurology
                </button>
                <button @click="filterSpecialty = 'orthopedics'"
                        :class="{'active': filterSpecialty === 'orthopedics'}"
                        class="filter-btn">
                    Orthopedics
                </button>
            </div>
        </div>

        <div class="mt-6 flex flex-col sm:flex-row gap-4">
            <div class="relative flex-1">
                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text"
                       x-model="searchQuery"
                       placeholder="Search by doctor name, specialty, or condition..."
                       class="w-full pl-12 pr-4 py-4 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all">
            </div>
            <select x-model="sortBy" class="px-6 py-4 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all font-semibold">
                <option value="rating">Highest Rated</option>
                <option value="experience">Most Experienced</option>
                <option value="consultations">Most Consultations</option>
                <option value="price-low">Price: Low to High</option>
                <option value="price-high">Price: High to Low</option>
            </select>
        </div>
    </div>

    <!-- Live Doctors Grid -->
    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8 mt-8">
        <!-- Doctor Card 1 -->
        <div class="doctor-card-premium p-8">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <img src="/images/doctors/dr-rahman.jpg"
                             alt="Dr. Ahmed Rahman"
                             class="doctor-avatar"
                             onerror="this.src='https://ui-avatars.com/api/?name=Ahmed+Rahman&size=120&background=3b82f6&color=fff&bold=true'">
                        <div class="absolute -bottom-2 -right-2 bg-green-500 rounded-full p-2">
                            <svg class="w-4 h-4 text-white online-indicator" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="inline-flex items-center gap-1 bg-green-100 text-green-800 px-3 py-1 rounded-full font-bold text-sm mb-2">
                        <div class="live-indicator-dot w-2 h-2"></div>
                        LIVE
                    </div>
                    <div class="text-sm text-gray-500">Available Now</div>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-2xl font-black text-gray-900 mb-2">Dr. Ahmed Rahman</h3>
                <div class="specialty-badge mb-3">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                    </svg>
                    Cardiology Specialist
                </div>
                <div class="flex items-center gap-4 text-sm text-gray-600 mb-4">
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        15 years exp.
                    </div>
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                        </svg>
                        3,247 consultations
                    </div>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <div class="rating-stars">
                        <span class="rating-star">★</span>
                        <span class="rating-star">★</span>
                        <span class="rating-star">★</span>
                        <span class="rating-star">★</span>
                        <span class="rating-star">★</span>
                    </div>
                    <span class="font-bold text-gray-900">4.9 <span class="text-gray-500 font-normal">(1,234 reviews)</span></span>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed">
                    MBBS, MD (Cardiology), FCPS. Specialist in heart diseases, hypertension, and cardiac emergencies.
                </p>
            </div>

            <div class="border-t border-gray-200 pt-6 mb-6">
                <div class="grid grid-cols-2 gap-4 text-center">
                    <div>
                        <div class="text-2xl font-black text-green-600 mb-1">৳100</div>
                        <div class="text-xs text-gray-600">Audio Call</div>
                    </div>
                    <div>
                        <div class="text-2xl font-black text-blue-600 mb-1">৳200</div>
                        <div class="text-xs text-gray-600">Video Call</div>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <div class="grid grid-cols-2 gap-3">
                    <button onclick="startConsultation('audio', 1)" class="consultation-btn consultation-btn-audio">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        Audio
                    </button>
                    <button onclick="startConsultation('video', 1)" class="consultation-btn consultation-btn-video">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                        </svg>
                        Video
                    </button>
                </div>
                <button onclick="startConsultation('text', 1)" class="consultation-btn consultation-btn-text w-full">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                    </svg>
                    Start Text Chat
                </button>
                <button onclick="requestPersonalDoctor(1)" class="btn-outline-premium w-full">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                    </svg>
                    Request as Personal Doctor
                </button>
            </div>
        </div>

        <!-- Doctor Card 2 -->
        <div class="doctor-card-premium p-8">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <img src="/images/doctors/dr-sultana.jpg"
                             alt="Dr. Fatima Sultana"
                             class="doctor-avatar"
                             onerror="this.src='https://ui-avatars.com/api/?name=Fatima+Sultana&size=120&background=8b5cf6&color=fff&bold=true'">
                        <div class="absolute -bottom-2 -right-2 bg-green-500 rounded-full p-2">
                            <svg class="w-4 h-4 text-white online-indicator" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="inline-flex items-center gap-1 bg-green-100 text-green-800 px-3 py-1 rounded-full font-bold text-sm mb-2">
                        <div class="live-indicator-dot w-2 h-2"></div>
                        LIVE
                    </div>
                    <div class="text-sm text-gray-500">Available Now</div>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-2xl font-black text-gray-900 mb-2">Dr. Fatima Sultana</h3>
                <div class="specialty-badge mb-3">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"/>
                    </svg>
                    Pediatrics & Child Care
                </div>
                <div class="flex items-center gap-4 text-sm text-gray-600 mb-4">
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        12 years exp.
                    </div>
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                        </svg>
                        2,891 consultations
                    </div>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <div class="rating-stars">
                        <span class="rating-star">★</span>
                        <span class="rating-star">★</span>
                        <span class="rating-star">★</span>
                        <span class="rating-star">★</span>
                        <span class="rating-star">★</span>
                    </div>
                    <span class="font-bold text-gray-900">4.8 <span class="text-gray-500 font-normal">(987 reviews)</span></span>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed">
                    MBBS, DCH, FCPS (Pediatrics). Expert in child health, vaccinations, growth & development.
                </p>
            </div>

            <div class="border-t border-gray-200 pt-6 mb-6">
                <div class="grid grid-cols-2 gap-4 text-center">
                    <div>
                        <div class="text-2xl font-black text-green-600 mb-1">৳100</div>
                        <div class="text-xs text-gray-600">Audio Call</div>
                    </div>
                    <div>
                        <div class="text-2xl font-black text-blue-600 mb-1">৳200</div>
                        <div class="text-xs text-gray-600">Video Call</div>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <div class="grid grid-cols-2 gap-3">
                    <button onclick="startConsultation('audio', 2)" class="consultation-btn consultation-btn-audio">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        Audio
                    </button>
                    <button onclick="startConsultation('video', 2)" class="consultation-btn consultation-btn-video">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                        </svg>
                        Video
                    </button>
                </div>
                <button onclick="startConsultation('text', 2)" class="consultation-btn consultation-btn-text w-full">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                    </svg>
                    Start Text Chat
                </button>
                <button onclick="requestPersonalDoctor(2)" class="btn-outline-premium w-full">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                    </svg>
                    Request as Personal Doctor
                </button>
            </div>
        </div>

        <!-- Doctor Card 3 -->
        <div class="doctor-card-premium p-8">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <img src="/images/doctors/dr-khan.jpg"
                             alt="Dr. Khalid Khan"
                             class="doctor-avatar"
                             onerror="this.src='https://ui-avatars.com/api/?name=Khalid+Khan&size=120&background=10b981&color=fff&bold=true'">
                        <div class="absolute -bottom-2 -right-2 bg-green-500 rounded-full p-2">
                            <svg class="w-4 h-4 text-white online-indicator" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="inline-flex items-center gap-1 bg-green-100 text-green-800 px-3 py-1 rounded-full font-bold text-sm mb-2">
                        <div class="live-indicator-dot w-2 h-2"></div>
                        LIVE
                    </div>
                    <div class="text-sm text-gray-500">Available Now</div>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-2xl font-black text-gray-900 mb-2">Dr. Khalid Khan</h3>
                <div class="specialty-badge mb-3">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"/>
                    </svg>
                    Dermatology & Skin Care
                </div>
                <div class="flex items-center gap-4 text-sm text-gray-600 mb-4">
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        10 years exp.
                    </div>
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                        </svg>
                        2,156 consultations
                    </div>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <div class="rating-stars">
                        <span class="rating-star">★</span>
                        <span class="rating-star">★</span>
                        <span class="rating-star">★</span>
                        <span class="rating-star">★</span>
                        <span class="rating-star">★</span>
                    </div>
                    <span class="font-bold text-gray-900">4.9 <span class="text-gray-500 font-normal">(756 reviews)</span></span>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed">
                    MBBS, DDV (Dermatology). Specialist in acne, eczema, psoriasis, and cosmetic dermatology.
                </p>
            </div>

            <div class="border-t border-gray-200 pt-6 mb-6">
                <div class="grid grid-cols-2 gap-4 text-center">
                    <div>
                        <div class="text-2xl font-black text-green-600 mb-1">৳100</div>
                        <div class="text-xs text-gray-600">Audio Call</div>
                    </div>
                    <div>
                        <div class="text-2xl font-black text-blue-600 mb-1">৳200</div>
                        <div class="text-xs text-gray-600">Video Call</div>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <div class="grid grid-cols-2 gap-3">
                    <button onclick="startConsultation('audio', 3)" class="consultation-btn consultation-btn-audio">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        Audio
                    </button>
                    <button onclick="startConsultation('video', 3)" class="consultation-btn consultation-btn-video">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                        </svg>
                        Video
                    </button>
                </div>
                <button onclick="startConsultation('text', 3)" class="consultation-btn consultation-btn-text w-full">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                    </svg>
                    Start Text Chat
                </button>
                <button onclick="requestPersonalDoctor(3)" class="btn-outline-premium w-full">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                    </svg>
                    Request as Personal Doctor
                </button>
            </div>
        </div>

        <!-- Add more doctor cards as needed -->
    </div>

    <!-- Load More Button -->
    <div class="text-center mt-12">
        <button class="btn-primary px-8 py-4 text-lg">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            Load More Doctors
        </button>
    </div>
</section>

<!-- Premium Services Section -->
<section class="container mx-auto px-4 mt-20">
    <div class="text-center mb-12">
        <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">Premium Healthcare Services</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Exclusive long-term care and personalized health management
        </p>
    </div>

    <div class="grid md:grid-cols-2 gap-8">
        <!-- Personal Doctor Program -->
        <div class="premium-service-card">
            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full mb-6">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span class="text-white font-bold text-sm">PREMIUM</span>
                </div>
                <h3 class="text-3xl font-black mb-4">Personal Doctor Program</h3>
                <p class="text-gray-300 mb-6 leading-relaxed">
                    Get a dedicated personal doctor who knows your complete medical history and provides ongoing care tailored to your needs.
                </p>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-green-400 shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <div class="font-bold text-lg">Unlimited Consultations</div>
                            <div class="text-gray-400 text-sm">Call, video, or chat anytime - no extra charges</div>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-green-400 shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <div class="font-bold text-lg">Priority Response</div>
                            <div class="text-gray-400 text-sm">Get answers within 15 minutes, 24/7</div>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-green-400 shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <div class="font-bold text-lg">Preventive Care Plans</div>
                            <div class="text-gray-400 text-sm">Personalized health tracking & screening schedules</div>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-green-400 shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <div class="font-bold text-lg">Specialist Coordination</div>
                            <div class="text-gray-400 text-sm">Seamless referrals when specialist care is needed</div>
                        </div>
                    </li>
                </ul>
                <button onclick="#" class="btn-base bg-white text-gray-900 hover:bg-gray-100 w-full text-lg">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                    Request Personal Doctor
                </button>
            </div>
        </div>

        <!-- Emergency Home Visit -->
        <div class="premium-service-card">
            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 bg-red-500/20 backdrop-blur-sm px-4 py-2 rounded-full mb-6">
                    <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-red-400 font-bold text-sm">EMERGENCY</span>
                </div>
                <h3 class="text-3xl font-black mb-4">Emergency Home Visits</h3>
                <p class="text-gray-300 mb-6 leading-relaxed">
                    When you can't travel, we bring expert medical care to your doorstep within 30-60 minutes.
                </p>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-green-400 shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <div class="font-bold text-lg">Rapid Response</div>
                            <div class="text-gray-400 text-sm">Doctor arrives within 30-60 minutes</div>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-green-400 shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <div class="font-bold text-lg">Complete Medical Kit</div>
                            <div class="text-gray-400 text-sm">Equipped with diagnostic tools & emergency meds</div>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-green-400 shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <div class="font-bold text-lg">Hospital Coordination</div>
                            <div class="text-gray-400 text-sm">Seamless admission if hospitalization needed</div>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-green-400 shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <div class="font-bold text-lg">Follow-up Care</div>
                            <div class="text-gray-400 text-sm">Free virtual follow-up within 24 hours</div>
                        </div>
                    </li>
                </ul>
                <button onclick="#" class="btn-base bg-red-500 text-white hover:bg-red-600 w-full text-lg">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                    </svg>
                    Request Emergency Visit
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Doctor Community Section -->
<section class="container mx-auto px-4 mt-20 mb-20">
    <div class="text-center mb-12">
        <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">Doctor Community Hub</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Join the conversation where medical professionals discuss future healthcare trends and innovations
        </p>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        <!-- Community Discussion Card -->
        <div class="community-card">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-purple-100 p-3 rounded-xl">
                    <svg class="w-8 h-8 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                        <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/>
                    </svg>
                </div>
                <span class="text-sm font-bold text-purple-600 bg-purple-100 px-3 py-1 rounded-full">125 Active</span>
            </div>
            <h3 class="text-xl font-black text-gray-900 mb-3">Risk Management Forum</h3>
            <p class="text-gray-600 mb-4">
                Collaborative discussions on patient safety, clinical decision making, and emerging health risks.
            </p>
            <button onclick="#" class="btn-secondary w-full">
                Join Discussion
            </button>
        </div>

        <!-- Medical Technology Card -->
        <div class="community-card">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-blue-100 p-3 rounded-xl">
                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <span class="text-sm font-bold text-blue-600 bg-blue-100 px-3 py-1 rounded-full">89 Active</span>
            </div>
            <h3 class="text-xl font-black text-gray-900 mb-3">Medical Tech Innovation</h3>
            <p class="text-gray-600 mb-4">
                Explore AI diagnostics, telemedicine advances, and cutting-edge medical devices revolutionizing care.
            </p>
            <button onclick="#" class="btn-secondary w-full">
                Explore Innovations
            </button>
        </div>

        <!-- Case Studies Card -->
        <div class="community-card">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-green-100 p-3 rounded-xl">
                    <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <span class="text-sm font-bold text-green-600 bg-green-100 px-3 py-1 rounded-full">203 Cases</span>
            </div>
            <h3 class="text-xl font-black text-gray-900 mb-3">Clinical Case Studies</h3>
            <p class="text-gray-600 mb-4">
                Learn from real-world cases, share experiences, and collaborate on complex diagnostic challenges.
            </p>
            <button onclick="#" class="btn-secondary w-full">
                Browse Cases
            </button>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Alpine.js component for doctor portal
    function doctorPortal() {
        return {
            filterSpecialty: 'all',
            searchQuery: '',
            sortBy: 'rating',

            init() {
                console.log('Doctor Portal Initialized');
            }
        }
    }

    // Consultation functions
    function startConsultation(type, doctorId) {
        const consultationTypes = {
            'audio': { name: 'Audio Call', price: '৳100' },
            'video': { name: 'Video Call', price: '৳200' },
            'text': { name: 'Text Chat', price: '৳50' }
        };

        const consultation = consultationTypes[type];

        if (confirm(`Start ${consultation.name} consultation for ${consultation.price}?`)) {
            window.ShifaHealthcare.showGlobalNotification(
                `Connecting you with the doctor... ${consultation.name} will begin shortly.`,
                'success',
                3000
            );

            // Redirect to consultation page
            setTimeout(() => {
                window.location.href = `/consultation/${type}/${doctorId}`;
            }, 1500);
        }
    }

    function requestPersonalDoctor(doctorId) {
        if (confirm('Request this doctor as your personal healthcare provider? This will give you unlimited consultations and priority care.')) {
            window.ShifaHealthcare.showGlobalNotification(
                'Your request has been sent. The doctor will review and respond within 24 hours.',
                'success',
                5000
            );

            // Send request to backend
            setTimeout(() => {
                window.location.href = `/personal-doctor/request/${doctorId}`;
            }, 2000);
        }
    }

    // Initialize page
    document.addEventListener('DOMContentLoaded', () => {
        console.log('🏥 Doctor Portal Page Loaded');
    });
</script>
@endpush
