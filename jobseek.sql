-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 02:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobseek`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied`
--

CREATE TABLE `applied` (
  `id` int(255) NOT NULL,
  `user_num` varchar(255) NOT NULL,
  `job_id` int(255) NOT NULL,
  `DATETIME` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applied`
--

INSERT INTO `applied` (`id`, `user_num`, `job_id`, `DATETIME`) VALUES
(9, '8949977178', 2, '2025-04-21 22:12:35'),
(10, '7307205576', 13, '2025-04-22 02:13:12'),
(11, '8267852795', 1, '2025-04-22 02:47:05'),
(12, '8267852795', 2, '2025-04-22 02:47:12'),
(13, '7307205576', 1, '2025-04-22 03:03:16'),
(14, '7307205576', 2, '2025-04-22 03:20:16'),
(16, '8267852795', 18, '2025-04-22 03:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `msg` longtext NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `mail`, `msg`, `datetime`) VALUES
(1, 'sanchit', 'email@gmail.com', 'dfoewjgojroijfeoijofijoijoiejoifjhahhahaha', '2025-04-22 05:56:39'),
(2, 'Sanchit Garg', 'sanchitgarg639@gmail.com', 'juyhrtgefwdqsjtyhrtgerfwedqws', '2025-04-22 06:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `jobpost`
--

CREATE TABLE `jobpost` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `discp` longtext NOT NULL,
  `leastyr` varchar(255) NOT NULL,
  `DATETIME` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobpost`
--

INSERT INTO `jobpost` (`id`, `title`, `company`, `location`, `salary`, `discp`, `leastyr`, `DATETIME`) VALUES
(1, 'Typescripting', 'typescriber', 'online', 'Rs.10k to Rs.35k', 'voice to text, typing job. ', '1', '2025-04-21 06:10:31'),
(2, 'Lead Software Engineer', 'Capital One', 'East London', '$108,177 - $108,177', 'Back End/Full Stack, Do you love building and pioneering in the technology space? At Capital One, you\'ll', '3', '2025-04-21 07:51:10'),
(4, 'Senior Software Engineer', 'Capital One', 'east london', 'Rs.100k to Rs.500k', 'software developer for our company', '3', '2025-04-21 16:14:49'),
(7, 'Software Engineer', 'TechNova Solutions', 'Bangalore, India', ' ₹6,00,000 – ₹9,00,000 per annum', 'Develop and maintain web-based applications', '2', '2025-04-22 01:44:56'),
(8, 'Digital Marketing Executive', 'MarketHive Media', 'Mumbai, India', '₹3,00,000 – ₹5,00,000 per annum', 'Handle SEO, social media, and ad campaigns', '1', '2025-04-22 01:46:08'),
(9, 'Data Analyst', 'InsightsLab Pvt Ltd', ' Hyderabad, India', '₹5,50,000 – ₹7,00,000 per annum', 'Analyze data and create reports for clients', '2', '2025-04-22 01:47:01'),
(10, 'Front-End Developer', ' PixelCraft Technologies', 'Pune, India', '₹4,50,000 – ₹6,50,000 per annum', 'Create responsive UIs using HTML, CSS, JS', '1', '2025-04-22 01:47:48'),
(11, ' HR Executive', 'WorkNest HR Services', 'Jaipur, India', '₹3,20,000 – ₹4,50,000 per annum', 'Manage recruitment and employee relations\r\n\r\n', '1', '2025-04-22 01:48:26'),
(12, 'AI Engineer', 'NeuralNest AI Labs', 'Bengaluru, India', '₹10,00,000 – ₹14,00,000 per annum', 'Build and optimize deep learning models', '2', '2025-04-22 01:50:19'),
(13, 'Machine Learning Developer', ' MindForge Innovations', 'Noida, India', '₹8,00,000 – ₹12,00,000 per annum', ' Train ML models and deploy them to production', '2', '2025-04-22 01:51:03'),
(14, 'Data Scientist', 'VisionGrid Analytics', 'Chennai, India', '₹9,00,000 – ₹13,00,000 per annum', 'Data cleaning, model development, and insights generation', '2', '2025-04-22 01:51:38'),
(15, ' NLP Engineer', 'SpeakFlow Technologies', 'Gurgaon, India', '₹9,50,000 – ₹15,00,000 per annum', 'Job Description: Build chatbots and language models for products', '3', '2025-04-22 01:52:14'),
(16, 'Computer Vision Engineer', 'DeepPixel Systems', 'Hyderabad, India', '₹8,50,000 – ₹13,00,000 per annum', 'Work on object detection and image processing', '2', '2025-04-22 01:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `userimg` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `skill1` varchar(255) NOT NULL,
  `skill2` varchar(255) NOT NULL,
  `skill3` varchar(255) NOT NULL,
  `skill4` varchar(255) NOT NULL,
  `softwear1` varchar(255) NOT NULL,
  `softwear2` varchar(255) NOT NULL,
  `softwear3` varchar(255) NOT NULL,
  `hobby1` varchar(255) NOT NULL,
  `hobby2` varchar(255) NOT NULL,
  `hobby3` varchar(255) NOT NULL,
  `main_skill` varchar(255) NOT NULL,
  `main_skill_discp` varchar(255) NOT NULL,
  `personal` varchar(255) NOT NULL,
  `deg1` varchar(255) NOT NULL,
  `uni1` varchar(255) NOT NULL,
  `deg2` varchar(255) NOT NULL,
  `uni2` varchar(255) NOT NULL,
  `deg3` varchar(255) NOT NULL,
  `uni3` varchar(255) NOT NULL,
  `topic1` varchar(255) NOT NULL,
  `work1` varchar(255) NOT NULL,
  `topic2` varchar(255) NOT NULL,
  `work2` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `DATETIME` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`id`, `fname`, `lname`, `userimg`, `mail`, `phone`, `address`, `website`, `skill1`, `skill2`, `skill3`, `skill4`, `softwear1`, `softwear2`, `softwear3`, `hobby1`, `hobby2`, `hobby3`, `main_skill`, `main_skill_discp`, `personal`, `deg1`, `uni1`, `deg2`, `uni2`, `deg3`, `uni3`, `topic1`, `work1`, `topic2`, `work2`, `pass`, `DATETIME`) VALUES
(3, 'Sanchit', 'Garg', 'person_img/carousel (1).jpg', 'sanchitgarg639@gmail.com', '8267852795', 'G-91 Nehru Colony Dehradun - 248001 Uttarakhand India', 'https://jobseek.com', 'Web Dev', 'Graphic Designer', 'Product Management', ' ', 'Git', 'Canva', 'Xampp', 'Art', 'Badminton', 'Stock Analysis', 'Web Dev', 'Web development has turned out to be one of the most dynamic and in-demand fields in today\'s technological world. Web development encompasses the entire process of building and maintaining websites, ranging from simple static pages to intricate e-commerce', 'Web development has turned out to be one of the most dynamic and in-demand fields in today\'s technological world. Web development encompasses the entire process of building and maintaining websites, ranging from simple static pages to intricate e-commerce', '2024-2028 : B.Tech CSE AI/ML', 'IIIT NGP', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '$2y$10$psJEbG3w1JFxMyHmHxhryuhW70PK7C5rMR95dWDMT5RP0u6yEJHQi', '2025-04-17 14:56:24'),
(4, 'Shlok', 'Dadhich', 'person_img/view-3d-pink-car_23-2150998509.avif', 'shlokshrama7@gmail.com', '8949977178', '4 butibori nagpur - 341503 Maharashtra  India', 'www.example.com', 'A', 'B', 'C', ' ', 'VS Code', 'Jupyter Notebook', ' ', 'Playing', 'thinking ', ' ', 'XYZ', 'qwr', 'wer', '2024', 'IIIT nagpur', ' ', ' ', ' ', ' ', '20', 'redfe', 'euif', 'djfirfw', '$2y$10$Suby9kvqKLltvlWrZtv2w.XS0Bc06N6v5ZgbnQAUUv0EByMMC45Om', '2025-04-21 22:02:56'),
(5, 'TANYA MAY', 'MARTIN', 'person_img/360_F_1201277332_vAd5O5lotXvbrf67HuRSu8y0JNzgUfO8.webp', 'tanymay1@gmail.com', '7307205576', '162 Glory Road Nagpur - 441108 Maharashtra  India', 'martdesignfolio.com', 'Web Design', 'Graphic Design', 'Animation', 'Data Handling', 'Jupyter Notebook', 'TensorFlow', 'Scikit-learn', 'Competitive Programming', 'Traveling', 'Building Side Projects', 'Machine Learning', 'Experienced in building, training, and deploying machine learning models using Python, TensorFlow, and Scikit-learn. Skilled in data preprocessing, algorithm tuning, and performance evaluation.', 'Passionate AI & ML enthusiast with a background in data science. Strong analytical thinker, detail-oriented, and eager to solve real-world problems using cutting-edge technology.', '2021–2024, B.Sc. in Artificial Intelligence', 'Indian Institute of Technology Nagpur', '2019–2021, Higher Secondary Education (PCM)', 'Delhi Public School Jaipur', ' ', ' ', '2023 (6-month internship), ML Model Development', 'Built regression and classification models using Scikit-learn and deployed a sentiment analysis app using Flask.', '2024 (Freelance), Data Cleaning & Visualization', ' Worked on cleaning and visualizing large datasets using Pandas and Matplotlib for a client project focused on retail sales.', '$2y$10$Z83FsbO4ZvpfAC/UBhZLs.YTG57mhY8sOAzY0jm0oAitAXAnSIcTO', '2025-04-22 02:12:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied`
--
ALTER TABLE `applied`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobpost`
--
ALTER TABLE `jobpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied`
--
ALTER TABLE `applied`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobpost`
--
ALTER TABLE `jobpost`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
