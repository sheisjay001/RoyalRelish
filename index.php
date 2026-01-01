<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' https://cdnjs.cloudflare.com; style-src 'self' 'unsafe-inline' https://cdnjs.cloudflare.com https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com https://cdnjs.cloudflare.com; img-src 'self' data:; connect-src 'self';">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <title>Royal Relish | Nigerian Virtual Restaurant</title>
    <meta name="description" content="We bring delicious, royal delicacies to your doorstep. Make it world class.">
    <link rel="stylesheet" href="css/style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <a href="#" class="logo">Royal <span class="highlight">Relish</span></a>
            
            <div class="nav-icons">
                <div class="cart-icon" id="cart-btn">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
                </div>
                <div class="menu-toggle" id="mobile-menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>

            <ul class="nav-menu">
                <li><a href="#home" class="nav-link">Home</a></li>
                <li><a href="#menu" class="nav-link">Menu</a></li>
                <li><a href="#about" class="nav-link">About Us</a></li>
                <li><a href="#contact" class="nav-link btn-primary">Order Now</a></li>
            </ul>
        </div>
    </nav>

    <!-- Cart Sidebar -->
    <div class="cart-sidebar" id="cart-sidebar">
        <div class="cart-header">
            <h3>Your Cart</h3>
            <span class="close-cart"><i class="fas fa-times"></i></span>
        </div>
        <div class="cart-items" id="cart-items">
            <!-- Cart items will be injected here -->
            <div class="empty-cart-msg">Your cart is empty</div>
        </div>
        <div class="cart-footer">
            <div class="total">
                <span>Total:</span>
                <span id="cart-total">₦0</span>
            </div>
            <button class="btn btn-primary btn-block" id="checkout-btn">Checkout on WhatsApp</button>
        </div>
    </div>
    <div class="cart-overlay" id="cart-overlay"></div>

    <!-- Hero Section -->
    <header id="home" class="hero">
        <div class="container hero-content">
            <h1>We Bring Delicious, <span class="royal-text">Royal Delicacies</span> To Your Doorstep.</h1>
            <p class="motto">Make it world class.</p>
            <div class="hero-btns">
                <a href="#menu" class="btn btn-primary">View Menu</a>
                <a href="#contact" class="btn btn-secondary">Contact Us</a>
            </div>
        </div>
    </header>

    <!-- Featured Menu Section -->
    <section id="menu" class="menu-section">
        <div class="container">
            <h2 class="section-title">Royal Menu</h2>
            <p class="section-subtitle">Experience the taste of Nigeria</p>
            
            <!-- Menu Controls -->
            <div class="menu-controls">
                <div class="search-container">
                    <i class="fas fa-search"></i>
                    <input type="text" id="menu-search" placeholder="Search delicious meals...">
                </div>
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">All</button>
                    <button class="filter-btn" data-filter="mains">Main Dishes</button>
                    <button class="filter-btn" data-filter="soups">Soups & Stews</button>
                    <button class="filter-btn" data-filter="snacks">Sides & Snacks</button>
                </div>
            </div>

            <div class="menu-grid">


                <!-- Menu Item 4 (Efo Riro) -->
                <div class="menu-card reveal" data-category="soups">
                    <div class="menu-img-container">
                        <img src="images/efo_riro.jpg" alt="Efo Riro" class="menu-img-lazy" loading="lazy">
                    </div>
                    <div class="menu-content">
                        <h3>Efo Riro Special</h3>
                        <p>Rich spinach stew made with assorted meats and fish. Choose your portion:</p>
                        <select class="variant-select">
                            <option value="3500" data-name="Efo Riro (750ml)">750ml Bowl - ₦3,500</option>
                            <option value="4500" data-name="Efo Riro (1000ml)">1000ml Bowl - ₦4,500</option>
                            <option value="2200" data-name="Efo Riro & Rice (Small)">With Rice (Small) - ₦2,200</option>
                            <option value="2500" data-name="Efo Riro & Rice (Big)">With Rice (Big) - ₦2,500</option>
                        </select>
                        <span class="price">₦3,500</span>
                        <button class="btn-add" data-name="Efo Riro (750ml)" data-price="3500">Add to Cart</button>
                    </div>
                </div>

                <!-- Menu Item 5 (Catfish Pepper Soup) -->
                <div class="menu-card reveal" data-category="soups">
                    <div class="menu-img-container">
                        <img src="images/catfish_peppersoup.jpg" alt="Catfish Pepper Soup" class="menu-img-lazy" loading="lazy">
                    </div>
                    <div class="menu-content">
                        <h3>Catfish Pepper Soup</h3>
                        <p>Fresh catfish prepared with traditional spices for a hot and spicy delight.</p>
                        <span class="price">₦2,800</span>
                        <button class="btn-add" data-name="Catfish Pepper Soup" data-price="2800">Add to Cart</button>
                    </div>
                </div>

                <!-- Menu Item 6 (Beef/Chicken Stew) -->
                <div class="menu-card reveal" data-category="soups">
                    <div class="menu-img-container">
                        <img src="images/beef_chicken_stew.jpg" alt="Beef/Chicken Stew" class="menu-img-lazy" loading="lazy">
                    </div>
                    <div class="menu-content">
                        <h3>Beef/Chicken Stew</h3>
                        <p>Rich and savory tomato-based stew with tender beef or chicken.</p>
                        <span class="price">₦5,000</span>
                        <button class="btn-add" data-name="Beef/Chicken Stew" data-price="5000">Add to Cart</button>
                    </div>
                </div>

                <!-- Menu Item 7 (Crunchy/Milky Peanuts) -->
                <div class="menu-card reveal" data-category="snacks">
                    <div class="menu-img-container">
                        <img src="images/peanuts.jpg" alt="Crunchy/Milky Peanuts" class="menu-img-lazy" loading="lazy">
                    </div>
                    <div class="menu-content">
                        <h3>Crunchy/Milky Peanuts</h3>
                        <p>Perfectly roasted, crunchy and milky peanuts. A delightful snack.</p>
                        <span class="price">₦1,500</span>
                        <button class="btn-add" data-name="Crunchy/Milky Peanuts" data-price="1500">Add to Cart</button>
                    </div>
                </div>

                <!-- Menu Item 8 (Pancakes) -->
                <div class="menu-card reveal" data-category="snacks">
                    <div class="menu-img-container">
                        <img src="images/pancakes.jpg" alt="Pancakes" class="menu-img-lazy" loading="lazy">
                    </div>
                    <div class="menu-content">
                        <h3>Pancakes</h3>
                        <p>Fluffy and golden pancakes served with syrup or honey.</p>
                        <span class="price">₦2,500</span>
                        <button class="btn-add" data-name="Pancakes" data-price="2500">Add to Cart</button>
                    </div>
                </div>

                <!-- Menu Item 9 (Jollof Rice) -->
                <div class="menu-card reveal" data-category="mains">
                    <div class="menu-img-container">
                        <img src="images/jollof_rice.jpg" alt="Jollof Rice" class="menu-img-lazy" loading="lazy">
                    </div>
                    <div class="menu-content">
                        <h3>Jollof Rice</h3>
                        <p>Classic Nigerian smoky Jollof Rice, served hot and spicy. Choose your size:</p>
                        <select class="variant-select">
                            <option value="1700" data-name="Jollof Rice (Small)">Small - ₦1,700</option>
                            <option value="2000" data-name="Jollof Rice (Big)">Big - ₦2,000</option>
                        </select>
                        <span class="price">₦1,700</span>
                        <button class="btn-add" data-name="Jollof Rice (Small)" data-price="1700">Add to Cart</button>
                    </div>
                </div>

                <!-- Menu Item 10 (Fried Rice) -->
                <div class="menu-card reveal" data-category="mains">
                    <div class="menu-img-container">
                        <img src="images/fried_rice.jpg" alt="Fried Rice" class="menu-img-lazy" loading="lazy">
                    </div>
                    <div class="menu-content">
                        <h3>Fried Rice</h3>
                        <p>Rich and flavorful Nigerian Fried Rice with mixed veggies and liver. Choose your size:</p>
                        <select class="variant-select">
                            <option value="1700" data-name="Fried Rice (Small)">Small - ₦1,700</option>
                            <option value="2000" data-name="Fried Rice (Big)">Big - ₦2,000</option>
                        </select>
                        <span class="price">₦1,700</span>
                        <button class="btn-add" data-name="Fried Rice (Small)" data-price="1700">Add to Cart</button>
                    </div>
                </div>

                <!-- Menu Item 11 (Stir-fried Pasta) -->
                <div class="menu-card reveal" data-category="mains">
                    <div class="menu-img-container">
                        <img src="images/stir_fried_pasta.jpg" alt="Stir-fried Pasta" class="menu-img-lazy" loading="lazy">
                    </div>
                    <div class="menu-content">
                        <h3>Stir-fried Pasta</h3>
                        <p>Delicious pasta stir-fried with fresh vegetables and special sauce.</p>
                        <span class="price">₦2,000</span>
                        <button class="btn-add" data-name="Stir-fried Pasta" data-price="2000">Add to Cart</button>
                    </div>
                </div>

                <!-- Menu Item 12 (Ewa Agoyin) -->
                <div class="menu-card reveal" data-category="mains">
                    <div class="menu-img-container">
                        <img src="images/ewa_agoyin.jpg" alt="Ewa Agoyin" class="menu-img-lazy" loading="lazy">
                    </div>
                    <div class="menu-content">
                        <h3>Ewa Agoyin</h3>
                        <p>Soft mashed beans served with spicy pepper sauce and plantain.</p>
                        <span class="price">₦3,000</span>
                        <button class="btn-add" data-name="Ewa Agoyin" data-price="3000">Add to Cart</button>
                    </div>
                </div>

                <!-- Menu Item 13 (Fried Chicken) -->
                <div class="menu-card reveal" data-category="snacks">
                    <div class="menu-img-container">
                        <img src="images/fried_chicken.jpg" alt="Fried Chicken" class="menu-img-lazy" loading="lazy">
                    </div>
                    <div class="menu-content">
                        <h3>Fried Chicken</h3>
                        <p>Crispy, golden-brown fried chicken seasoned to perfection.</p>
                        <span class="price">₦1,500</span>
                        <button class="btn-add" data-name="Fried Chicken" data-price="1500">Add to Cart</button>
                    </div>
                </div>

                <!-- Menu Item 14 (Chevon Pepper Soup) -->
                <div class="menu-card reveal" data-category="soups">
                    <div class="menu-img-container">
                        <img src="images/chevon_peppersoup.jpg" alt="Chevon Pepper Soup" class="menu-img-lazy" loading="lazy">
                    </div>
                    <div class="menu-content">
                        <h3>Chevon Pepper Soup</h3>
                        <p>Spicy and aromatic goat meat pepper soup.</p>
                        <span class="price">₦3,000</span>
                        <button class="btn-add" data-name="Chevon Pepper Soup" data-price="3000">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="about-content">
                <h2>About Royal Relish</h2>
                <p>Royal Relish is a premier Nigerian virtual restaurant dedicated to delivering authentic, high-quality meals straight to your home. We believe every meal should be a royal experience.</p>
                <div class="features">
                    <div class="feature">
                        <i class="fas fa-shipping-fast"></i>
                        <span>Fast Delivery</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-star"></i>
                        <span>World Class Quality</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-leaf"></i>
                        <span>Fresh Ingredients</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section">
        <div class="container">
            <h2 class="section-title">Get in Touch</h2>
            <div class="contact-wrapper">
                <form id="contact-form" class="contact-form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required placeholder="How can we help you?" rows="5"></textarea>
                    </div>
                    <button type="button" id="whatsapp-contact-btn" class="btn btn-whatsapp">
                        <i class="fab fa-whatsapp"></i> Send via WhatsApp
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h3>Royal Relish</h3>
                    <p>Experience the taste of royalty with every bite. Authentic Nigerian cuisine delivered to your doorstep.</p>
                </div>
                <div class="footer-col">
                    <h3>Contact Us</h3>
                    <p>📍 Gidan Kwano, Minna, Niger State, Nigeria</p>
                    <p>📞 <a href="tel:+2349074555365" style="color: white;">+234 907 455 5365</a></p>
                    <p>✉️ <a href="mailto:info@royalrelish.com" style="color: white;">info@royalrelish.com</a></p>
                </div>
                <div class="footer-col">
                    <h3>Opening Hours</h3>
                    <ul style="list-style: none; padding: 0; font-size: 0.9rem;">
                        <li>Mon - Tue: Closed</li>
                        <li>Wed: 14:00 – 19:00</li>
                        <li>Thu: Closed</li>
                        <li>Fri: 14:00 – 19:00</li>
                        <li>Sat: 08:00 – 19:00</li>
                        <li>Sun: 14:00 – 19:00</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Follow Us</h3>
                    <div class="social-links">
                        <a href="#">Instagram</a>
                        <a href="#">Twitter</a>
                        <a href="#">Facebook</a>
                    </div>
                </div>
            </div>
            <p class="copyright">&copy; 2026 Royal Relish. All rights reserved.</p>
        </div>
    </footer>

    <!-- Toast Container -->
    <div id="toast-container"></div>

    <!-- Back to Top Button -->
    <button id="back-to-top" title="Back to Top"><i class="fas fa-arrow-up"></i></button>

    <script src="js/script.js"></script>
</body>
</html>
