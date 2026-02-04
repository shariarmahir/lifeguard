// Enhanced Alpine.js Data Components with Premium Features
document.addEventListener('alpine:init', () => {
    // Enhanced Main app component with advanced features
    Alpine.data('app', () => ({
        mobileMenuOpen: false,
        scrolled: false,
        videoPlaying: true,
        videoMuted: true,
        darkMode: false,
        isLoading: false,

        init() {
            console.log('Shifa App Initialized');

            // Initialize scroll handler
            window.addEventListener('scroll', this.handleScroll.bind(this));
            this.handleScroll();

            // Initialize smooth scrolling
            this.initSmoothScroll();

            // Initialize video controls if video exists
            this.initVideoControls();

            // Initialize scroll animations
            this.initScrollAnimations();

            // Initialize accessibility
            this.initAccessibility();

            // Setup back to top button
            this.setupBackToTop();
        },

        handleScroll() {
            this.scrolled = window.pageYOffset > 50;

            // Update back to top button visibility
            const backToTop = document.getElementById('back-to-top');
            if (backToTop) {
                if (window.pageYOffset > 300) {
                    backToTop.classList.remove('opacity-0', 'translate-y-2');
                    backToTop.classList.add('opacity-100', 'translate-y-0');
                } else {
                    backToTop.classList.add('opacity-0', 'translate-y-2');
                    backToTop.classList.remove('opacity-100', 'translate-y-0');
                }
            }
        },

        setupBackToTop() {
            const backToTop = document.getElementById('back-to-top');
            if (backToTop) {
                backToTop.style.transition = 'all 0.3s ease';
            }
        },

        initSmoothScroll() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = anchor.getAttribute('href');
                    if (targetId === '#') return;

                    const target = document.querySelector(targetId);
                    if (target) {
                        const headerHeight = document.querySelector('header')?.offsetHeight || 0;
                        const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight - 20;

                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });

                        this.closeMobileMenu();
                    }
                });
            });
        },

        initVideoControls() {
            const video = document.querySelector('.hero-video');
            if (!video) return;

            video.addEventListener('loadeddata', () => {
                video.play().catch(e => {
                    console.log('Video autoplay prevented by browser policy');
                    this.videoPlaying = false;
                });
            });

            // Add intersection observer for video performance
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        video.play().catch(() => {});
                    } else {
                        video.pause();
                    }
                });
            }, { threshold: 0.5 });

            observer.observe(video);
        },

        toggleVideo() {
            const video = document.querySelector('.hero-video');
            if (video) {
                if (this.videoPlaying) {
                    video.pause();
                    this.videoPlaying = false;
                } else {
                    video.play().catch(() => {});
                    this.videoPlaying = true;
                }
            }
        },

        toggleMute() {
            const video = document.querySelector('.hero-video');
            if (video) {
                video.muted = !video.muted;
                this.videoMuted = video.muted;

                this.showNotification(
                    video.muted ? 'Video muted' : 'Video unmuted',
                    'info',
                    2000
                );
            }
        },

        initScrollAnimations() {
            if (!('IntersectionObserver' in window)) return;

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in-up');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            document.querySelectorAll('.premium-card, .device-card-premium, .emergency-card-premium, .moving-card, .timeline-phase').forEach(el => {
                observer.observe(el);
            });
        },

        initAccessibility() {
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    this.closeMobileMenu();
                }
            });

            // Add skip links functionality
            const skipLink = document.querySelector('a[href="#main-content"]');
            if (skipLink) {
                skipLink.addEventListener('click', (e) => {
                    e.preventDefault();
                    const target = document.querySelector(skipLink.getAttribute('href'));
                    if (target) {
                        target.setAttribute('tabindex', '-1');
                        target.focus();
                    }
                });
            }
        },

        showNotification(message, type = 'info', duration = 5000) {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 max-w-md p-4 rounded-lg shadow-lg transform transition-all duration-300 translate-x-full`;

            const bgColor = {
                'success': 'bg-green-500',
                'error': 'bg-red-500',
                'warning': 'bg-yellow-500',
                'info': 'bg-blue-500'
            }[type] || 'bg-blue-500';

            notification.classList.add(bgColor);

            notification.innerHTML = `
                <div class="flex items-center justify-between text-white">
                    <p class="text-sm font-medium pr-4">${message}</p>
                    <button onclick="this.parentElement.parentElement.remove()"
                            class="text-white hover:text-gray-200 ml-4 shrink-0 focus:outline-none">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            `;

            document.body.appendChild(notification);

            // Animate in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            // Remove after duration
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.remove();
                    }
                }, 300);
            }, duration);
        },

        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        },

        closeMobileMenu() {
            this.mobileMenuOpen = false;
        },

        toggleMobileMenu() {
            this.mobileMenuOpen = !this.mobileMenuOpen;
        }
    }));

    // Enhanced Newsletter component
    Alpine.data('newsletter', () => ({
        email: '',
        loading: false,
        subscribed: false,
        errors: {},

        async subscribe() {
            this.errors = {};

            if (!this.email || !this.isValidEmail(this.email)) {
                this.errors.email = 'Please enter a valid email address';
                window.showGlobalNotification('Please enter a valid email address', 'warning');
                return;
            }

            this.loading = true;
            try {
                // Simulate API call
                await new Promise(resolve => setTimeout(resolve, 1500));

                const subscribers = this.getStorage('newsletter_subscribers', []);
                if (subscribers.includes(this.email)) {
                    window.showGlobalNotification('You are already subscribed to our newsletter', 'info');
                    this.subscribed = true;
                } else {
                    subscribers.push(this.email);
                    this.setStorage('newsletter_subscribers', subscribers);
                    this.subscribed = true;
                    window.showGlobalNotification('Welcome to Shifa! You\'ve successfully subscribed to our newsletter.', 'success');
                }

                this.email = '';
            } catch (error) {
                console.error('Newsletter subscription error:', error);
                window.showGlobalNotification('Failed to subscribe. Please try again.', 'error');
            } finally {
                this.loading = false;
            }
        },

        isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        },

        getStorage(key, defaultValue = null) {
            try {
                const item = localStorage.getItem(key);
                return item ? JSON.parse(item) : defaultValue;
            } catch (error) {
                return defaultValue;
            }
        },

        setStorage(key, value) {
            try {
                localStorage.setItem(key, JSON.stringify(value));
                return true;
            } catch (error) {
                return false;
            }
        }
    }));

    // Statistics Counter Component
    Alpine.data('statsCounter', () => ({
        stats: [
            { label: 'Patients Served', value: 0, target: 10000, suffix: '+', duration: 2000 },
            { label: 'Healthcare Providers', value: 0, target: 500, suffix: '+', duration: 1800 },
            { label: 'Rural Areas Covered', value: 0, target: 150, suffix: '+', duration: 1600 },
            { label: 'Success Rate', value: 0, target: 98, suffix: '%', duration: 2200 }
        ],
        animated: false,

        init() {
            this.observeStats();
        },

        observeStats() {
            if (!('IntersectionObserver' in window)) {
                this.animateStats();
                return;
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !this.animated) {
                        this.animateStats();
                        this.animated = true;
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            observer.observe(this.$el);
        },

        animateStats() {
            this.stats.forEach((stat, index) => {
                setTimeout(() => {
                    this.animateValue(index, stat.target, stat.duration);
                }, index * 200);
            });
        },

        animateValue(index, target, duration) {
            const startTime = performance.now();
            const step = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);

                // Easing function
                const easeOut = 1 - Math.pow(1 - progress, 3);

                this.stats[index].value = Math.floor(target * easeOut);

                if (progress < 1) {
                    requestAnimationFrame(step);
                } else {
                    this.stats[index].value = target;
                }
            };
            requestAnimationFrame(step);
        }
    }));

    // Stories Carousel Component
    Alpine.data('storiesCarousel', () => ({
        currentVideoIndex: 0,
        currentPhotoIndex: 0,
        videoStories: [
            {
                title: "Rural Community Transformation",
                description: "How Shifa's telemedicine brought specialist care to remote villages in Rangpur",
                video: "rural-transformation.mp4",
                thumbnail: "rural-transformation-thumb.jpg"
            },
            {
                title: "Emergency Response Success",
                description: "Life-saving emergency response in critical situations using AI diagnostics",
                video: "emergency-response.mp4",
                thumbnail: "emergency-response-thumb.jpg"
            },
            {
                title: "Maternal Health Journey",
                description: "Supporting mothers through pregnancy and childbirth with advanced monitoring",
                video: "maternal-health.mp4",
                thumbnail: "maternal-health-thumb.jpg"
            }
        ],
        photoStories: [
            {
                title: "Community Health Fair",
                story: "Bringing free health checkups and awareness to rural communities",
                photo: "community-health-fair.jpg"
            },
            {
                title: "Children's Vaccination Drive",
                story: "Ensuring every child receives essential vaccines for a healthy future",
                photo: "vaccination-drive.jpg"
            }
        ],

        init() {
            // Auto-advance photo stories every 4 seconds
            this.autoPlayInterval = setInterval(() => {
                this.nextPhoto();
            }, 4000);
        },

        selectVideo(index) {
            this.currentVideoIndex = index;
        },

        nextPhoto() {
            this.currentPhotoIndex = (this.currentPhotoIndex + 1) % this.photoStories.length;
        },

        previousPhoto() {
            this.currentPhotoIndex = this.currentPhotoIndex === 0
                ? this.photoStories.length - 1
                : this.currentPhotoIndex - 1;
        },

        destroy() {
            if (this.autoPlayInterval) {
                clearInterval(this.autoPlayInterval);
            }
        }
    }));
});

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    console.log('🏥 Shifa Healthcare - Enhanced Application Loaded');

    // Initialize global functions
    initializeGlobalFunctions();

    // Initialize smooth scrolling
    initSmoothScrolling();

    // Initialize lazy loading
    initializeLazyLoading();
});

// Global utility functions
function initializeGlobalFunctions() {
    window.ShifaHealthcare = {
        scrollToTop: function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        },

        showGlobalNotification: function(message, type = 'info', duration = 5000) {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 max-w-md p-4 rounded-lg shadow-lg transform transition-all duration-300 translate-x-full`;

            const bgColor = {
                'success': 'bg-green-500',
                'error': 'bg-red-500',
                'warning': 'bg-yellow-500',
                'info': 'bg-blue-500'
            }[type] || 'bg-blue-500';

            notification.classList.add(bgColor);

            notification.innerHTML = `
                <div class="flex items-center justify-between text-white">
                    <div class="flex items-center">
                        <span class="mr-3 text-lg">${type === 'success' ? '✓' : type === 'error' ? '✕' : 'ℹ'}</span>
                        <p class="text-sm font-medium">${message}</p>
                    </div>
                    <button onclick="this.parentElement.parentElement.remove()"
                            class="text-white hover:text-gray-200 ml-4 shrink-0 focus:outline-none">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.remove();
                    }
                }, 300);
            }, duration);
        },

        debounce: function(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        },

        throttle: function(func, limit) {
            let inThrottle;
            return function() {
                const args = arguments;
                const context = this;
                if (!inThrottle) {
                    func.apply(context, args);
                    inThrottle = true;
                    setTimeout(() => inThrottle = false, limit);
                }
            };
        }
    };
}

// Initialize smooth scrolling
function initSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const target = document.querySelector(targetId);
            if (target) {
                const headerHeight = document.querySelector('header')?.offsetHeight || 0;
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight - 20;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Initialize lazy loading
function initializeLazyLoading() {
    if (!('IntersectionObserver' in window)) return;

    const lazyObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;

                if (element.dataset.src) {
                    element.src = element.dataset.src;
                    element.removeAttribute('data-src');
                }

                if (element.dataset.srcset) {
                    element.srcset = element.dataset.srcset;
                    element.removeAttribute('data-srcset');
                }

                lazyObserver.unobserve(element);
            }
        });
    }, {
        rootMargin: '50px 0px'
    });

    document.querySelectorAll('img[data-src], video[data-src]').forEach(element => {
        lazyObserver.observe(element);
    });
}
