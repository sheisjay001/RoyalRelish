document.addEventListener('DOMContentLoaded', () => {
    const mobileMenu = document.getElementById('mobile-menu');
    const navMenu = document.querySelector('.nav-menu');
    const navLinks = document.querySelectorAll('.nav-link');

    // Toggle Mobile Menu
    mobileMenu.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
        navMenu.classList.toggle('active');
    });

    // Close Mobile Menu when a link is clicked
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            navMenu.classList.remove('active');
        });
    });

    // Smooth Scrolling for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                // Adjust for fixed navbar height
                const headerOffset = 70;
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: "smooth"
                });
            }
        });
    });

    // Navbar scroll effect and Back to Top Button
    window.addEventListener('scroll', () => {
        const navbar = document.querySelector('.navbar');
        const backToTopBtn = document.getElementById('back-to-top');
        
        // Navbar
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }

        // Back to Top
        if (window.scrollY > 500) {
            backToTopBtn.classList.add('visible');
        } else {
            backToTopBtn.classList.remove('visible');
        }
    });

    // Back to Top Click Event
    document.getElementById('back-to-top').addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // --- Operating Hours Logic ---
    const checkOperatingHours = () => {
        const now = new Date();
        const day = now.getDay(); // 0 = Sunday, 1 = Monday, etc.
        const hour = now.getHours();
        const minute = now.getMinutes();
        const currentTime = hour + (minute / 60);

        // Schedule:
        // 0 (Sun): 14:00 - 19:00 (14 - 19)
        // 1 (Mon): Closed
        // 2 (Tue): Closed
        // 3 (Wed): 14:00 - 19:00 (14 - 19)
        // 4 (Thu): Closed
        // 5 (Fri): 14:00 - 19:00 (14 - 19)
        // 6 (Sat): 08:00 - 19:00 (8 - 19)

        let isOpen = false;

        switch (day) {
            case 0: // Sunday
            case 3: // Wednesday
            case 5: // Friday
                if (currentTime >= 14 && currentTime < 19) isOpen = true;
                break;
            case 6: // Saturday
                if (currentTime >= 8 && currentTime < 19) isOpen = true;
                break;
            default: // Mon, Tue, Thu
                isOpen = false;
        }

        return isOpen;
    };

    // --- Toast Notification Logic ---
    const toastContainer = document.getElementById('toast-container');

    const showToast = (message, type = 'success') => {
        const toast = document.createElement('div');
        toast.classList.add('toast', type);
        
        const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
        
        toast.innerHTML = `
            <i class="fas ${icon}"></i>
            <span>${message}</span>
        `;
        
        toastContainer.appendChild(toast);
        
        // Trigger reflow to enable transition
        setTimeout(() => {
            toast.classList.add('show');
        }, 10);
        
        // Remove after 3 seconds
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => {
                toast.remove();
            }, 300); // Wait for transition out
        }, 3000);
    };

    // --- Shopping Cart Logic ---
    let cart = JSON.parse(localStorage.getItem('royalRelishCart')) || [];
    const cartBtn = document.getElementById('cart-btn');
    const cartSidebar = document.getElementById('cart-sidebar');
    const closeCart = document.querySelector('.close-cart');
    const cartOverlay = document.getElementById('cart-overlay');
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotalElement = document.getElementById('cart-total');
    const cartCountElement = document.querySelector('.cart-count');
    const checkoutBtn = document.getElementById('checkout-btn');
    const addToCartButtons = document.querySelectorAll('.btn-add');

    // Save cart to local storage
    const saveCart = () => {
        localStorage.setItem('royalRelishCart', JSON.stringify(cart));
    };

    // Open Cart
    cartBtn.addEventListener('click', () => {
        cartSidebar.classList.add('active');
        cartOverlay.classList.add('active');
    });

    // Close Cart
    const closeCartSidebar = () => {
        cartSidebar.classList.remove('active');
        cartOverlay.classList.remove('active');
    };

    closeCart.addEventListener('click', closeCartSidebar);
    cartOverlay.addEventListener('click', closeCartSidebar);

    // Add to Cart Functionality
    addToCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            const name = button.getAttribute('data-name');
            const price = parseInt(button.getAttribute('data-price'));
            
            addItemToCart(name, price);
            // openCartSidebar(); // Removed auto-open to show toast instead
        });
    });

    function openCartSidebar() {
        cartSidebar.classList.add('active');
        cartOverlay.classList.add('active');
    }

    function addItemToCart(name, price) {
        // Check if item already exists
        const existingItem = cart.find(item => item.name === name);

        if (existingItem) {
            existingItem.quantity += 1;
            showToast(`Increased ${name} quantity`, 'success');
        } else {
            cart.push({
                name: name,
                price: price,
                quantity: 1
            });
            showToast(`${name} added to cart`, 'success');
        }
        
        saveCart();
        updateCartUI();
    }

    function removeItemFromCart(name) {
        cart = cart.filter(item => item.name !== name);
        saveCart();
        updateCartUI();
        showToast(`${name} removed from cart`, 'error');
    }

    function updateCartUI() {
        // Clear current items
        cartItemsContainer.innerHTML = '';
        
        let total = 0;
        let count = 0;

        if (cart.length === 0) {
            cartItemsContainer.innerHTML = '<div class="empty-cart-msg">Your cart is empty</div>';
        } else {
            cart.forEach(item => {
                total += item.price * item.quantity;
                count += item.quantity;

                const itemElement = document.createElement('div');
                itemElement.classList.add('cart-item');
                itemElement.innerHTML = `
                    <div class="cart-item-info">
                        <h4>${item.name}</h4>
                        <span class="cart-item-price">₦${item.price.toLocaleString()} x ${item.quantity}</span>
                    </div>
                    <span class="remove-item" data-name="${item.name}"><i class="fas fa-trash"></i></span>
                `;
                cartItemsContainer.appendChild(itemElement);
            });
        }

        // Update Total and Count
        cartTotalElement.innerText = '₦' + total.toLocaleString();
        cartCountElement.innerText = count;

        // Re-attach event listeners to remove buttons
        document.querySelectorAll('.remove-item').forEach(btn => {
            btn.addEventListener('click', (e) => {
                // Find the closest parent with the data-name attribute or the icon itself
                const name = e.currentTarget.getAttribute('data-name');
                removeItemFromCart(name);
            });
        });
    }

    // Checkout via WhatsApp
    checkoutBtn.addEventListener('click', () => {
        if (!checkOperatingHours()) {
            showToast('We are currently closed. Opening hours are in the footer.', 'error');
            // Optional: You can still allow browsing but warn them.
            // If you want to strictly prevent order, keep the return.
            // For now, let's warn but allow adding to cart (this is checkout button though).
            // Let's block checkout if closed.
            return; 
        }

        if (cart.length === 0) {
            showToast('Your cart is empty!', 'error');
            return;
        }

        let message = "Hello Royal Relish, I would like to place an order:%0A%0A*Order Details:*%0A";
        let total = 0;

        cart.forEach(item => {
            message += `- ${item.name} (x${item.quantity}) - ₦${(item.price * item.quantity).toLocaleString()}%0A`;
            total += item.price * item.quantity;
        });

        message += `%0A*Total: ₦${total.toLocaleString()}*`;
        
        // Replace with your actual WhatsApp number
        const phoneNumber = "2349074555365"; 
        const whatsappUrl = `https://wa.me/${phoneNumber}?text=${message}`;
        
        window.open(whatsappUrl, '_blank');
    });

    // --- Scroll Reveal Animation ---
    const revealElements = document.querySelectorAll('.reveal');

    const revealOnScroll = () => {
        const windowHeight = window.innerHeight;
        const elementVisible = 150;

        revealElements.forEach((reveal) => {
            const elementTop = reveal.getBoundingClientRect().top;

            if (elementTop < windowHeight - elementVisible) {
                reveal.classList.add('active');
            } else {
                reveal.classList.remove('active');
            }
        });
    };

    window.addEventListener('scroll', revealOnScroll);
    // Trigger once on load
    revealOnScroll();
    // Initialize Cart UI from storage
    updateCartUI();

    // --- Variant Selection Logic ---
    const variantSelects = document.querySelectorAll('.variant-select');
    
    variantSelects.forEach(select => {
        select.addEventListener('change', (e) => {
            const selectedOption = e.target.options[e.target.selectedIndex];
            const price = selectedOption.value;
            const name = selectedOption.getAttribute('data-name');
            const parentCard = e.target.closest('.menu-content');
            
            // Update Price Display
            const priceDisplay = parentCard.querySelector('.price');
            priceDisplay.innerText = '₦' + parseInt(price).toLocaleString();
            
            // Update Add to Cart Button
            const addButton = parentCard.querySelector('.btn-add');
            addButton.setAttribute('data-name', name);
            addButton.setAttribute('data-price', price);
        });
    });

    // --- Menu Filtering Logic ---
    const filterButtons = document.querySelectorAll('.filter-btn');
    const menuSearch = document.getElementById('menu-search');
    const menuCards = document.querySelectorAll('.menu-card');

    // Function to filter menu
    const filterMenu = () => {
        const searchTerm = menuSearch.value.toLowerCase();
        const activeBtn = document.querySelector('.filter-btn.active');
        const activeCategory = activeBtn ? activeBtn.getAttribute('data-filter') : 'all';

        menuCards.forEach(card => {
            const cardCategory = card.getAttribute('data-category');
            const cardTitle = card.querySelector('h3').innerText.toLowerCase();
            const cardDesc = card.querySelector('p').innerText.toLowerCase();

            const matchesSearch = cardTitle.includes(searchTerm) || cardDesc.includes(searchTerm);
            const matchesCategory = activeCategory === 'all' || activeCategory === cardCategory;

            if (matchesSearch && matchesCategory) {
                card.style.display = 'block';
                // Slight delay to allow display:block to render before adding active class for transition
                setTimeout(() => {
                    card.classList.add('active');
                }, 50);
            } else {
                card.style.display = 'none';
                card.classList.remove('active');
            }
        });
        
        // Re-calculate scroll positions
        setTimeout(revealOnScroll, 100);
    };

    // Filter Button Click Event
    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            btn.classList.add('active');
            
            filterMenu();
        });
    });

    // Search Input Event
    if (menuSearch) {
        menuSearch.addEventListener('input', filterMenu);
    }

    // --- Contact Form Handling ---
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const formData = new FormData(contactForm);
            const data = Object.fromEntries(formData.entries());
            
            // Basic client-side validation
            if (!data.name || !data.email || !data.message) {
                showToast('Please fill in all fields.', 'error');
                return;
            }

            // Simulate form submission (or send to process_order.php)
            fetch('process_order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(formData).toString()
            })
            .then(response => response.json())
            .then(result => {
                if (result.status === 'success') {
                    showToast('Message sent successfully!', 'success');
                    contactForm.reset();
                } else {
                    showToast('Error sending message. Please try again.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Something went wrong.', 'error');
            });
        });
    }

});
