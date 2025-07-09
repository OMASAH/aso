CREATE DATABASE box_store CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE box_store;

CREATE TABLE bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  length_cm INT NOT NULL,
  width_cm INT NOT NULL,
  depth_cm INT NOT NULL,
  quantity INT NOT NULL,
  box_type VARCHAR(50) NOT NULL,
  transparent VARCHAR(50) NOT NULL,
  decoration VARCHAR(50) NOT NULL,
  has_dividers VARCHAR(10) NOT NULL,
  divider_count INT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);