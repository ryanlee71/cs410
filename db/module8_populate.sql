use module8Schema;
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