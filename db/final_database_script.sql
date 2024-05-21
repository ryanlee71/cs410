CREATE TABLE IF NOT EXISTS `users` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(20) NOT NULL,
  last_name VARCHAR(20) NOT NULL,
  user_name VARCHAR(20) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password TEXT NOT NULL,
  last_logged_in TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  access_level TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS `products` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  price DECIMAL NOT NULL,
  description TEXT NOT NULL,
  image TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS `cart` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  checked_out BOOLEAN NOT NULL DEFAULT FALSE,
  user_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS `cart_products` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  quantity INTEGER NOT NULL,
  cart_id INT NOT NULL,
  FOREIGN KEY (cart_id) REFERENCES cart(id),
  products_id INT NOT NULL,
  FOREIGN KEY (products_id) REFERENCES products(id),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS `blogs` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  content TEXT NOT NULL,
  user_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
  last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS `reviews` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title TEXT NOT NULL,
  review_text TEXT NOT NULL,
  product_id INT NOT NULL,
  rating INT NOT NULL DEFAULT 0,
  FOREIGN KEY (product_id) REFERENCES products(id),
  user_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
  commentdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE comments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name TEXT NOT NULL,
  title TEXT NOT NULL,
  comment_text TEXT NOT NULL,
  commentdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, price, description, image)
VALUES 
  ('Gaming Mouse', 129.00, 'A specialized mouse designed for gaming with features like high DPI, customizable buttons, and ergonomic designs.', 'images/mouse.jpg'),
  ('Gaming Headphones', 199.00, 'Headphones with an attached microphone designed for gaming, providing immersive sound quality and clear communication.', 'images/headphones.jpg'),
  ('Gaming Chair', 1500.00, 'Ergonomic chairs designed for long gaming sessions, offering support and comfort to reduce strain on the body.', 'images/chair.jpg'),
  ('Gaming Desk Mat', 40.00, 'Large desk mat that is optimized for gaming, providing smooth and precise tracking for gaming mice.', 'images/deskmat.jpg'),
  ('Gaming Keyboard', 179.00, 'Keyboards optimized for gaming with features such as mechanical switches, customizable RGB lighting, and dedicated macro keys.', 'images/keyboard.jpg'),
  ('Gaming Monitor', 329.00, 'High-performance monitors with features like high refresh rates, low response times, and adaptive sync technologies for smooth gameplay.', 'images/monitor.jpg'),
  ('Gaming Router', 179.00, 'Routers optimized for online gaming, prioritizing network traffic to reduce lag and latency for a smoother gaming experience.', 'images/router.jpg'),
  ('Gaming Microphone', 490.00, 'High-quality microphones designed for gamers and streamers, offering clear voice communication and professional-grade audio recording capabilities.', 'images/mic.jpg'),
  ('Gaming Desk', 289.00, 'Desks designed specifically for gaming setups, featuring cable management systems, ergonomic designs, and ample space for multiple monitors and peripherals.', 'images/desk.jpg'),
  ('Gaming Laptop', 2100.00, 'High-performance laptops optimized for gaming, featuring powerful processors, dedicated graphics cards, and high-resolution displays.', 'images/laptop.jpg');
INSERT INTO users (first_name, last_name, email, user_name, password, access_level)
VALUES 
  ('Admin', 'Admin', 'admin@kcgamingteam.com', 'admin', 'admin', 'admin'),
  ('Publisher', 'Publisher', 'publisher@kcgamingteam.com', 'publisher', 'publisher', 'publisher'),
  ('Ryan', 'Lee', 'ryan@kcgamingteam.com', 'customer', 'customer', 'customer');
INSERT INTO blogs (title, content, user_id)
VALUES 
  ('The Evolution of Gaming Mice', 'Gaming mice have come a long way from simple two-button designs to advanced models with customizable buttons, high DPI sensors, and ergonomic shapes.', 3),
  ('Choosing the Right Gaming Headphones', 'Selecting the perfect gaming headphones involves considering factors like sound quality, comfort, microphone quality, and compatibility with different platforms.', 3),
  ('Building the Ultimate Gaming Setup', 'Creating the ultimate gaming setup requires careful planning and consideration of components like monitors, keyboards, chairs, and accessories to enhance your gaming experience.', 3);
INSERT INTO reviews (title, review_text, product_id, user_id, rating)
VALUES
  ('Great Mouse for Gaming', 'The gaming mouse is comfortable to use and has customizable buttons that enhance my gaming experience.', 1, 3, 5),
  ('Excellent Sound Quality', 'The gaming headphones provide immersive sound quality and clear communication, making them perfect for gaming and online chats.', 2, 3, 5),
  ('Comfortable and Durable Chair', 'The gaming chair is ergonomic and provides excellent support during long gaming sessions, reducing strain on my back and neck.', 3, 3, 4),
  ('Meets Expectations', 'The gaming chair is meets expectations, I prefer a different brand though.', 3, 1, 2);