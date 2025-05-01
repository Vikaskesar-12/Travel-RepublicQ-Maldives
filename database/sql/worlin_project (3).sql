-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2025 at 12:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `worlin_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'inactive',
  `publish_date` date NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `seo_title` text DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` text DEFAULT NULL,
  `faqs` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `author`, `category_id`, `content`, `slug`, `status`, `publish_date`, `images`, `seo_title`, `seo_description`, `seo_keywords`, `faqs`, `created_at`, `updated_at`) VALUES
(4, 'Russia and Ukrainian War- Impact on...', 'vikas kesar', 1, '<h3>University Categories and Admissions</h3><p>Universities are often classified into various categories to help students select the best option based on their preferences and needs. These categories include:</p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Public vs Private Universities</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Public Universities</strong>: These are government-funded institutions that generally have lower tuition fees for domestic students. They often offer a wide variety of programs and have strong research facilities.</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Private Universities</strong>: These universities are privately funded and tend to offer specialized courses with a focus on providing quality education. Tuition fees may be higher compared to public universities.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Undergraduate and Graduate Programs</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Undergraduate Programs</strong>: These programs typically include bachelor\'s degrees in fields such as arts, science, engineering, medicine, and more. They are generally for students who have completed their high school education.</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Graduate Programs</strong>: These are advanced programs that lead to master\'s degrees or doctoral degrees. They often require specific prerequisites and qualifications such as a bachelor\'s degree in a related field.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Top Ranking Universities</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Some universities are ranked higher due to their academic reputation, research outputs, faculty, and alumni success. Top universities offer globally recognized degrees and extensive academic resources.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>International Universities</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Many universities operate internationally, offering programs that allow students to study abroad. International universities are popular among students looking for global exposure and advanced learning.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>State-wise Universities</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Universities may also be categorized based on their location, particularly if they are specific to a particular state or region. These institutions focus on the needs and opportunities of students within that geographic area</li></ol><p><br></p><p><br></p><p><br></p>', 'importance-of-universities-in-shaping-futures', 'active', '2024-12-05', '\"[\\\"blog_images\\\\\\/LPKBcuqrvgrh9LujY7f2RqbU5ds2BZgmP6ezTHhx.jpg\\\"]\"', 'fghfg', 'fghfg', '[{\"value\":\"ggh\"},{\"value\":\"hfg\"},{\"value\":\"hfgh\"}]', '[{\"question\":\"yy\",\"answer\":\"yyy\"},{\"question\":\"ryt\",\"answer\":\"yrtyrt\"}]', '2024-12-05 01:15:21', '2025-01-18 06:04:40'),
(5, 'PG in Germany', 'Saurabh kesare', 1, '<h3>University Categories and Admissions</h3><p>Universities are often classified into various categories to help students select the best option based on their preferences and needs. These categories include:</p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Public vs Private Universities</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Public Universities</strong>: These are government-funded institutions that generally have lower tuition fees for domestic students. They often offer a wide variety of programs and have strong research facilities.</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Private Universities</strong>: These universities are privately funded and tend to offer specialized courses with a focus on providing quality education. Tuition fees may be higher compared to public universities.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Undergraduate and Graduate Programs</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Undergraduate Programs</strong>: These programs typically include bachelor\'s degrees in fields such as arts, science, engineering, medicine, and more. They are generally for students who have completed their high school education.</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Graduate Programs</strong>: These are advanced programs that lead to master\'s degrees or doctoral degrees. They often require specific prerequisites and qualifications such as a bachelor\'s degree in a related field.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Top Ranking Universities</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Some universities are ranked higher due to their academic reputation, research outputs, faculty, and alumni success. Top universities offer globally recognized degrees and extensive academic resources.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>International Universities</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Many universities operate internationally, offering programs that allow students to study abroad. International universities are popular among students looking for global exposure and advanced learning.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>State-wise Universities</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Universities may also be categorized based on their location, particularly if they are specific to a particular state or region. These institutions focus on the needs and opportunities of students within that geographic area</li></ol><p><br></p><p><br></p>', 'the-role-of-universities-in-career-development', 'active', '2024-12-14', '\"[\\\"blog_images\\\\\\/9IUA3pS4GSrH4BPUG7cMTsamvYTPlxZu5UnUd6ld.jpg\\\"]\"', 'yrty', 'yrtyrt', '[{\"value\":\"jg\"},{\"value\":\"ghj\"},{\"value\":\"try\"},{\"value\":\"yrty\"}]', '[{\"question\":\"tyrty\",\"answer\":\"rytryr\"},{\"question\":\"yrty\",\"answer\":\"tryrt\"}]', '2024-12-05 01:16:54', '2025-01-20 01:09:29'),
(6, 'PG in Belarus', 'Gagan', 2, '<h3>University Categories and Admissions</h3><p>Universities are often classified into various categories to help students select the best option based on their preferences and needs. These categories include:</p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Public vs Private Universities</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Public Universities</strong>: These are government-funded institutions that generally have lower tuition fees for domestic students. They often offer a wide variety of programs and have strong research facilities.</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Private Universities</strong>: These universities are privately funded and tend to offer specialized courses with a focus on providing quality education. Tuition fees may be higher compared to public universities.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Undergraduate and Graduate Programs</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Undergraduate Programs</strong>: These programs typically include bachelor\'s degrees in fields such as arts, science, engineering, medicine, and more. They are generally for students who have completed their high school education.</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Graduate Programs</strong>: These are advanced programs that lead to master\'s degrees or doctoral degrees. They often require specific prerequisites and qualifications such as a bachelor\'s degree in a related field.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Top Ranking Universities</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Some universities are ranked higher due to their academic reputation, research outputs, faculty, and alumni success. Top universities offer globally recognized degrees and extensive academic resources.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>International Universities</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Many universities operate internationally, offering programs that allow students to study abroad. International universities are popular among students looking for global exposure and advanced learning.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>State-wise Universities</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Universities may also be categorized based on their location, particularly if they are specific to a particular state or region. These institutions focus on the needs and opportunities of students within that geographic area</li></ol><p><br></p><p><br></p><p><br></p>', 'pg-in-belarus', 'active', '2024-12-18', '\"[\\\"blog_images\\\\\\/P4spaFY7NTXjPhzBgQRrxMUmPVlRpjDDcrXJON50.jpg\\\"]\"', 'yrtyr', 'ytryrt', '[{\"value\":\"yry\"},{\"value\":\"yrt\"},{\"value\":\"rty\"},{\"value\":\"yrty\"}]', '[{\"question\":\"yrt\",\"answer\":\"yrtyrty\"},{\"question\":\"yrty\",\"answer\":\"yrtyrt\"}]', '2024-12-05 01:17:35', '2025-01-20 01:09:48'),
(32, 'Public vs Private Universities:', 'vikas kesar', 3, '<h3>University Categories and Admissions</h3><p>Universities are often classified into various categories to help students select the best option based on their preferences and needs. These categories include:</p><ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Public vs Private Universities</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Public Universities</strong>: These are government-funded institutions that generally have lower tuition fees for domestic students. They often offer a wide variety of programs and have strong research facilities.</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Private Universities</strong>: These universities are privately funded and tend to offer specialized courses with a focus on providing quality education. Tuition fees may be higher compared to public universities.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Undergraduate and Graduate Programs</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Undergraduate Programs</strong>: These programs typically include bachelor\'s degrees in fields such as arts, science, engineering, medicine, and more. They are generally for students who have completed their high school education.</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Graduate Programs</strong>: These are advanced programs that lead to master\'s degrees or doctoral degrees. They often require specific prerequisites and qualifications such as a bachelor\'s degree in a related field.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Top Ranking Universities</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Some universities are ranked higher due to their academic reputation, research outputs, faculty, and alumni success. Top universities offer globally recognized degrees and extensive academic resources.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>International Universities</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Many universities operate internationally, offering programs that allow students to study abroad. International universities are popular among students looking for global exposure and advanced learning.</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>State-wise Universities</strong>:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Universities may also be categorized based on their location, particularly if they are specific to a particular state or region. These institutions focus on the needs and opportunities of students within that geographic area</li></ol><p><br></p><p><br></p><p><br></p>', 'public-vs-private-universities', 'active', '2025-01-08', '\"[\\\"blog_images\\\\\\/mB7PxRc5tXVgnnRdYtEWU7OVU8edbvJ6Guv3LdkD.jpg\\\"]\"', 'yrtyr', 'rtyrty', '[{\"value\":\"yrty\"},{\"value\":\"rtyr\"},{\"value\":\"ytr\"}]', '[{\"question\":\"yrty\",\"answer\":\"yrty\"},{\"question\":\"rtyr\",\"answer\":\"ytryrt\"}]', '2025-01-13 03:24:38', '2025-01-20 01:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admission Updates:', 'active', '2024-12-04 05:04:23', '2024-12-13 00:54:38'),
(2, 'Research and Publications:', 'active', '2024-12-04 05:05:25', '2024-12-19 00:29:05'),
(3, 'campus life', 'active', '2024-12-04 05:24:34', '2024-12-04 05:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `country_universities_details`
--

CREATE TABLE `country_universities_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `overview` text DEFAULT NULL,
  `eligibilityHeading` varchar(255) DEFAULT NULL,
  `eligibilityImage` varchar(255) DEFAULT NULL,
  `eligibilityParagraphs` text DEFAULT NULL,
  `admissionHeading` varchar(255) DEFAULT NULL,
  `admissionParagraphs` text DEFAULT NULL,
  `mediumOfTeachingImage` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `country_name` varchar(255) DEFAULT NULL,
  `country_image` varchar(255) DEFAULT NULL,
  `flag_image` varchar(255) DEFAULT NULL,
  `overviewHeading` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` text DEFAULT NULL,
  `faqs` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country_universities_details`
--

INSERT INTO `country_universities_details` (`id`, `overview`, `eligibilityHeading`, `eligibilityImage`, `eligibilityParagraphs`, `admissionHeading`, `admissionParagraphs`, `mediumOfTeachingImage`, `created_at`, `updated_at`, `country_name`, `country_image`, `flag_image`, `overviewHeading`, `description`, `seo_title`, `seo_description`, `seo_keywords`, `faqs`) VALUES
(13, '\"[\\\"Preferred Country for MBBS\\\",\\\"MBBS Indian Students: An Overview\\\",\\\"Preferred Country for MBBS\\\",\\\"Preferred Country for MBBS\\\",\\\"MBBS Indian Students: An Overview\\\",\\\"Preferred Country for MBBS\\\"]\"', 'dfdg', 'eligibility_images/LRwJToft4wvSu7RoEqj4HzXcz4jySiqCHgc0B2jh.jpg', '\"[\\\"dfdgfg\\\",\\\"fghfg\\\",\\\"hfggh\\\"]\"', 'dfdg', '\"[\\\"dgfgfg\\\",\\\"hfgh\\\",\\\"hfgfghf\\\"]\"', 'medium_of_teaching_images/px7q9cLspCdphE00DFtnCR1jMNsVVtpacumAc1S0.jpg', '2025-01-21 00:56:17', '2025-01-31 00:29:27', 'Bosnia', 'country_images/Ep0azUBIEPZZuV0q5d2NzHGlUy7l6YxOarFF9pja.jpg', 'flag_images/4J8iTMDPgDanrvoNfmNVLmm9vEZh8GukzsagKfCO.jpg', 'sfdfd', 'sfdf', 'dgfg', 'fgfg', '[{\"value\":\"dfdg\"},{\"value\":\"jhkhj\"},{\"value\":\"khk\"}]', '[{\"question\":\"fgfg\",\"answer\":\"fgfgf\"},{\"question\":\"kjhjk\",\"answer\":\"jkhjkh\"}]'),
(19, '\"[\\\"good\\\"]\"', 'gdfg', 'eligibility_images/X7CxIXfbPYovqPfhSpzjWICrp9qJIyVZgPXVjCNh.jpg', '\"[\\\"gdfgdf\\\"]\"', 'Here is a step-by-step process guide to study MBBS in Bosnia for Indian students', '\"[\\\"jfj\\\",\\\"gdfgd\\\"]\"', 'medium_of_teaching_images/XfreJbq4LnizUFxE2Ibbru4CjkODIYA9nYF6dP22.jpg', '2025-01-21 03:58:07', '2025-01-30 23:53:51', 'Russia', 'country_images/xQSY2lE6UdhGbHpJykfRWQYUNQc0EkUcurParHeW.jpg', 'flag_images/1nbfkZwLk5KK2NOag0n59JcaJCPcJEmTytMq1520.jpg', 'MBBS in Bosnia for Indian Students: An Overview', 'hiifdsfs', 'uio', 'uiouio', '[{\"value\":\"khjl\"},{\"value\":\"khjk\"},{\"value\":\"khj\"},{\"value\":\"uiy\"},{\"value\":\"iyui\"},{\"value\":\"uio\"}]', '[{\"question\":\"yuytu\",\"answer\":\"utyut\"},{\"question\":\"gdfg\",\"answer\":\"fdgdf\"}]'),
(21, '\"[\\\"asdsafd\\\",\\\"hfhfgh\\\"]\"', 'sffdf', 'eligibility_images/5178o6AGwFMqLv9WJCLsuxOqBuc4iWUNfBvndnvu.jpg', '\"[\\\"dsdfdf\\\",\\\"hfghfg\\\"]\"', 'sfsf', '\"[\\\"dfdfgd\\\",\\\"ghffghfg\\\"]\"', 'medium_of_teaching_images/Qg6OsPNlakstQ7XtW1IQskIhniRDgxerKqb1x0id.png', '2025-01-21 04:33:49', '2025-01-30 23:54:29', 'Poland', 'country_images/kaGIPBB05Y6JTF7O4cYRlRKQWJKGFVB0LdNYZQf1.jpg', 'flag_images/T0DrZx5JmR4QofS37SeWh25fOOrlWCV6vX74QrVL.jpg', 'hi', 'dsdsfsdf', 'dgfgfg', 'fgfhg', '[{\"value\":\"adsdsf\"}]', '[{\"question\":\"sdfdfdf\",\"answer\":\"sfdfdf\"},{\"question\":\"hfg\",\"answer\":\"hgfgh\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `course_description` text DEFAULT NULL,
  `course_type` enum('core','elective','mandatory') NOT NULL,
  `duration_years` int(11) DEFAULT 0,
  `duration_months` int(11) DEFAULT 0,
  `tuition_fees` decimal(10,2) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','inactive') DEFAULT 'active',
  `faqs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`faqs`)),
  `seo_title` text DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `department`, `slug`, `course_description`, `course_type`, `duration_years`, `duration_months`, `tuition_fees`, `currency`, `start_date`, `end_date`, `featured_image`, `background_image`, `created_at`, `updated_at`, `status`, `faqs`, `seo_title`, `seo_description`, `seo_keywords`) VALUES
(1, 'Bachelor of Computer Science', 'computer_science', 'computer_science', '<p>Bachelor of Computer Science and Engineering (B.CSE)</p><p>The <strong>Bachelor of Computer Science and Engineering (B.CSE)</strong> is a four-year undergraduate program designed to provide students with an in-depth understanding of computer science and engineering principles. The course blends core computer science concepts with practical applications, preparing students for a variety of careers in the tech industry. Students will learn about software development, programming languages, data structures, algorithms, networking, artificial intelligence, machine learning, and more. The program also includes hands-on projects and internships that provide real-world experience.</p><h4>Key Highlights of the Course:</h4><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Duration</strong>: 4 years (8 semesters)</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Degree Type</strong>: Bachelor of Computer Science and Engineering</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Eligibility</strong>: 10+2 with Physics, Chemistry, and Mathematics</li></ol><p><strong>Specializations Available</strong>:</p><ol><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Artificial Intelligence</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Cybersecurity</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Data Science</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Software Engineering</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Machine Learning</li></ol><p><strong>Career Opportunities</strong>:</p><ol><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Software Developer</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Data Scientist</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>AI Engineer</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Systems Analyst</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Network Engineer</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Web Developer</li></ol><p><strong>Course Highlights</strong>:</p><ol><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>In-depth understanding of computer science concepts.</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Hands-on experience with industry-standard tools and technologies.</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Internships and real-world projects.</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Research opportunities in emerging technologies.</li></ol><p><strong>Skills Developed</strong>:</p><ol><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Programming languages (C, C++, Python, Java, etc.)</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Problem-solving and critical thinking</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Database management</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Networking and security protocols</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Software development lifecycle.</li></ol><p><br></p>', 'core', 3, 0, 250000.00, 'INR', '2025-01-15', '2028-01-15', 'courses/7QRM4nkE22jQRFCDMlBnrcBDxX3vVyivCHTreok6.jpg', 'courses/fQARV8yiVNJoV3XMoaMNEUx5p8stW0nFxwnDrxxd.jpg', '2024-12-16 04:36:51', '2025-01-30 23:48:10', 'active', '[{\"question\":\"vikas\",\"answer\":\"what\"}]', 'Bachelor of Computer Science and Engineering (B.CSE)', 'Bachelor of Computer Science and Engineering (B.CSE)\r\nThe Bachelor of Computer Science and Engineering (B.CSE) is a four-year undergraduate program designed to provide students with an in-depth understanding of computer science and engineering principles.', '[{\"value\":\"Engineering\"},{\"value\":\"computer\"},{\"value\":\"Software Engineer\"}]'),
(2, 'MBA', 'business', 'mba', '<h3><strong>Course Name: MBA (Master of Business Administration)</strong></h3><p><strong>Description:</strong></p><p>MBA is a postgraduate program designed to develop skills in business and management. It prepares students for leadership roles in organizations by offering knowledge in areas like finance, marketing, human resources, operations, and entrepreneurship.</p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Duration:</strong> Typically 2 years</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Career Opportunities:</strong> Business Analyst, Marketing Manager, HR Manager, Entrepreneur, Consultant</li></ol><p><br></p><p><br></p>', 'elective', 2, 0, 1222.00, 'INR', '2024-12-14', '2024-12-13', 'courses/GYhxEqiGMbohhkHNBGVPd8lAelEH6XDVySdfT4vY.jpg', 'courses/tFbL00PNbuHFr0xWa3OtHYhPQ2kRRFMWAOrHyQbs.png', '2024-12-15 23:44:52', '2025-01-30 23:49:19', 'active', '[{\"question\":\"Are scholarships available for international students?\",\"answer\":\"BSc is an undergraduate program focusing on science and technology-related fields. It offers specialization in areas like\"},{\"question\":\"Are scholarships available for international students?\",\"answer\":\"Physics, Chemistry, Biology, Mathematics, and Computer Science, providing a strong foundation for further studies or technical careers.\"}]', 'mbbs collage', 'Mba collages', '[{\"value\":\"mba\"}]'),
(3, 'BSC', 'science', 'bsc', '<h3><strong>Course Name: BSc (Bachelor of Science)</strong></h3><p><strong>Description:</strong></p><p>BSc is an undergraduate program focusing on science and technology-related fields. It offers specialization in areas like Physics, Chemistry, Biology, Mathematics, and Computer Science, providing a strong foundation for further studies or technical careers.</p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Duration:</strong> Typically 3 years</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Career Opportunities:</strong> Research Assistant, Lab Technician, Data Analyst, Scientific Officer, Higher Education in Specialized Fields</li></ol><p><br></p><p><br></p>', 'mandatory', 12, 2, 22.00, 'INR', '2024-12-13', '2024-12-16', 'courses/4tozBvjHl9MSXDG1ibnR24ujKxuJ46Ywa4ncbmlS.jpg', 'courses/bWr2UjqhMQoLYZqNrSz4kCxFMcS0Np4XYT5hKrzJ.jpg', '2024-12-16 00:52:43', '2025-01-30 23:49:44', 'active', '[{\"question\":\"jhkhj\",\"answer\":\"khjkhj\"},{\"question\":\"khjk\",\"answer\":\"jhkh\"}]', 'kh', 'jkh', '[{\"value\":\"khjk\"},{\"value\":\"hk\"}]'),
(8, 'MSC', 'arts', 'msc', '<p>vxcxcvcxcvxcv</p><p><br></p><p><br></p><p><br></p>', 'elective', 2, 2, 989988.00, 'INR', '2024-12-16', '2024-12-16', 'courses/lUoTyI7U40KxnyXWogywlUAuQKedwv8jicG9FEkD.jpg', 'courses/5WnQ206hrK4Cf98opp7MmmESrISPh5pvPc31b85O.jpg', '2024-12-16 06:38:31', '2025-01-30 23:49:57', 'active', '[{\"question\":\"hh\",\"answer\":\"hhh\"}]', 'msc', 'msc  top courses', '[{\"value\":\"msc\"},{\"value\":\"top courses\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `course_university`
--

CREATE TABLE `course_university` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `questions` text NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `mobile_no`, `questions`, `status`, `created_at`, `updated_at`, `location`) VALUES
(38, 'Vikas Kesar', 'vskesar575@gmail.com', '8125126121', 'hii', 'active', '2025-01-17 02:08:37', '2025-01-17 02:08:37', 'Contact-us'),
(47, 'Vikas Kesar', 'vikaskesar575@gmail.com', '9125126121', 'hghf', 'active', '2025-01-18 06:22:06', '2025-01-18 06:22:06', 'pop-up'),
(59, 'Vikas Kesar', 'vikaskesar975@gmail.com', '+918125126121', 'I\'ve added both Export to CSV and Print buttons in the mb-3 text-end div. This ensures the buttons are aligned to the right of the page', 'active', '2025-01-30 01:42:21', '2025-01-30 01:42:21', 'pop-up'),
(60, 'Vikas Kesar', 'vikaskesar575@gmail.com', '9125126121', 'hii', 'active', '2025-01-30 05:21:15', '2025-01-30 05:21:15', 'contact-us'),
(61, 'Vikas Kesar', 'vikaskesar575@gmail.com', '9125126121', 'hiii', 'active', '2025-01-31 00:27:05', '2025-01-31 00:27:05', 'pop-up'),
(62, 'Vikas Kesar', 'vikaskesar575@gmail.com', '+919125126121', 'hiii', 'active', '2025-01-31 01:35:04', '2025-01-31 01:35:04', 'Country: bosnia Enquary'),
(63, 'Vikas Kesar', 'vikaskesar575@gmail.com', '+919125126121', 'hii', 'active', '2025-01-31 01:35:45', '2025-01-31 01:35:45', 'contact-us');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(2, 'Is MBBS from other countries valid in India?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. How much score in NEET do I need to study MBBS abroad? \r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. How much score in NEET do I need to study MBBS abroad?', '2024-12-04 01:37:25', '2024-12-04 03:03:23'),
(3, 'Is their any exit / qualifying exam in India after studying MBBS from Abroad?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. How much score in NEET do I need to study MBBS abroad?', '2024-12-04 03:03:39', '2024-12-13 01:20:05'),
(4, 'How much does it cost to study MBBS abroad?', 'Is there any exit/qualifying test in India after completing MBBS from abroad?', '2024-12-04 03:03:54', '2024-12-04 03:03:54'),
(5, 'Is NEET mandatory for studying MBBS Abroad?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. How much score in NEET do I need to study MBBS abroad?', '2024-12-04 03:04:07', '2024-12-13 01:20:19'),
(6, 'What is Duration of studying MBBS Abroad?', 'Apart from the pre-admission guidance, we\r\ntake responsibility to help you throughout\r\nyour study program.', '2024-12-04 03:04:30', '2024-12-13 01:20:59'),
(7, 'Is Living Cost is Europe Expensive?', 'Is Living Cost is Europe Expensive?Is Living Cost is Europe Expensive?Is Living Cost is Europe Expensive?Is Living Cost is Europe Expensive?Is Living Cost is Europe Expensive?Is Living Cost is Europe Expensive?Is Living Cost is Europe Expensive?Is Living Cost is Europe Expensive?Is Living Cost is Europe Expensive?', '2024-12-13 01:21:14', '2024-12-13 01:21:14'),
(8, 'What are the Top Medical Universities in Abroad?', 'What are the Top Medical Universities in Abroad?What are the Top Medical Universities in Abroad?What are the Top Medical Universities in Abroad?', '2024-12-13 01:21:32', '2024-12-13 01:21:32'),
(9, 'Is Indian food available in Abroad Universities?', 'Is Indian food available in Abroad Universities? Is Indian food available in Abroad Universities? Is Indian food available in Abroad Universities?', '2024-12-13 01:21:47', '2024-12-13 01:21:47'),
(10, 'Is Part-Time Job available while studying MBBS in Abroad Universities?', 'Is Part-Time Job available while studying MBBS in Abroad Universities? \r\nIs Part-Time Job available while studying MBBS in Abroad Universities? \r\nIs Part-Time Job available while studying MBBS in Abroad Universities?', '2024-12-13 01:21:58', '2024-12-13 01:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `fast_facts`
--

CREATE TABLE `fast_facts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_universities_details_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `sub_heading` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fast_facts`
--

INSERT INTO `fast_facts` (`id`, `country_universities_details_id`, `image`, `heading`, `sub_heading`, `created_at`, `updated_at`) VALUES
(3, 13, 'fast_facts/5F1GlD3B62YWp8r6EtaE0SPldroYr9whPe7JYdNS.png', 'sfdf', 'dfdgf', NULL, '2025-01-31 00:38:26'),
(4, 13, 'fast_facts/FOcKIjc6ORUytwyOlropbYhkYkgRvg076YKyw1Gu.png', 'sfdf', 'dfdfd', NULL, '2025-01-31 00:38:26'),
(17, 19, 'fast_facts/EL7fddYzofdaR0AW2Wt86e5kVzyCoBjiXpINxzZ5.png', 'hii', 'hoo', NULL, '2025-01-21 05:38:39'),
(20, 21, 'fast_facts/RzrRWgfFFHaSAxyZAU3IFlFBMKWRKPJj15ePTWUq.png', 'dfdgf', 'dgfgfg', NULL, '2025-01-21 05:39:56'),
(21, 19, 'fast_facts/uZzS50QkZLZVmvK2KgbC9jDHIpGcSNwk34fahDfx.png', 'ggd', 'gdfgd', '2025-01-21 05:38:39', '2025-01-21 05:38:39'),
(22, 21, 'fast_facts/ctqh63gKKz6c4PRAS5WweJK8CFBlUelv8W19Om1T.png', 'fgjgj', 'hfghfg', '2025-01-21 05:39:56', '2025-01-21 05:39:56'),
(23, 13, 'fast_facts/xBdzCoPbXW2Tk3oLcaEivBeJTZOVyjOaQXjYGAlK.png', 'languages', 'English', '2025-01-31 00:38:26', '2025-01-31 00:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_description` text DEFAULT NULL,
  `site_keywords` text DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `header_logo` varchar(255) DEFAULT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `contact_address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_name`, `site_description`, `site_keywords`, `contact_email`, `phone_number`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `meta_title`, `meta_description`, `meta_keywords`, `header_logo`, `footer_logo`, `contact_address`, `created_at`, `updated_at`) VALUES
(1, 'The Admission Advisor', 'it\'s an adventure! Leaving one\'s country and going abroad to study isn’t that easy. However, for medical students, there are many benefits to studying overseas (outside India).', 'website, blog, articles, tutorials', 'contact@addminssion.com', '+91 9878987887', 'https://facebook.com/mywebsite', 'https://twitter.com/mywebsite', 'https://instagram.com/mywebsite', 'https://linkedin.com/mywebsite', 'Welcome to My Website', 'This is the meta description for my website.', 'meta, keywords, SEO', 'logos/5l2KGQblkubvl3xwmlAV77gHYkjZzezn882YXLdK.png', 'logos/hEkE84y1kGxSGeLynlouKaybh6nB1xKA0ef8dgll.png', 'SEO108, Sector 47C, Chandigarh', '2024-12-11 11:10:41', '2025-02-03 03:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `guide_every_steps`
--

CREATE TABLE `guide_every_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `background_image` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guide_every_steps`
--

INSERT INTO `guide_every_steps` (`id`, `background_image`, `heading`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(4, 'guide_every_step_images/wlPAuMV9RYcqPqD2NqBRIypVxACCEh6dVkwQDB5q.jpg', 'Study MBBS In Europe', 'study-mbbs-in-europe', '<p>Study MBBS In Europe</p><p><br></p>', '2024-12-09 04:16:50', '2025-01-14 23:09:42'),
(5, 'guide_every_step_images/TFlb3TxmUrbqGBJ3vQ44iCxZSCC9scpyhKHPtXFB.jpg', 'Eligibility Criteria For MBBS Abroad', 'eligibility-criteria-for-mbbs-abroad', '<p>Eligibility Criteria For MBBS Abroad</p>', '2024-12-09 04:21:31', '2024-12-11 03:15:53'),
(6, 'guide_every_step_images/R6AIdfj4BYY4HdDGyMLgO0DwVKSfhaXWcpAJ9TKP.jpg', 'Documents required to study MBBS Abroad', 'documents-required-to-study-mbbs-abroad', '<p>Documents required to study MBBS Abroad</p>', '2024-12-09 04:21:50', '2024-12-11 03:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medium_of_teachings`
--

CREATE TABLE `medium_of_teachings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_universities_details_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `paragraph` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medium_of_teachings`
--

INSERT INTO `medium_of_teachings` (`id`, `country_universities_details_id`, `image`, `paragraph`, `created_at`, `updated_at`) VALUES
(3, 21, 'medium_of_teaching_icons/Vexv7rQeXA0ArWuU8OTVhvDfSDWBAewBxODXkvTn.png', 'dsfgdfgdfdfds', '2025-01-21 04:55:48', '2025-01-21 05:39:56'),
(6, 13, 'medium_of_teaching_icons/A3Cf8J7uQlwcbF7lWRy6ZAA5t9kU2aFSKcKgtr5g.jpg', 'ghkghjkhj', '2025-01-21 05:36:51', '2025-01-21 05:36:51'),
(7, 13, 'medium_of_teaching_icons/mqRd1zOkGy4PrpYnPImBjlEOFYDCYaamZkzFPVYq.jpg', 'khjkhj', '2025-01-21 05:36:51', '2025-01-21 05:36:51'),
(8, 19, 'medium_of_teaching_icons/jPXcg9gOLYE8peFuz4DX14BxwPTadpPxIkPnvHm5.png', 'gdf', '2025-01-21 05:38:39', '2025-01-21 05:38:39'),
(9, 19, 'medium_of_teaching_icons/FS4uJOIH7scKZ48HgZKJXDXTUljRTJUqBGLKMKSw.jpg', 'dfgdfg', '2025-01-21 05:38:39', '2025-01-21 05:38:39'),
(10, 21, 'medium_of_teaching_icons/uqayc8AgD9G10h8LyBQdPkz7gyMdV37tQrYgKPNt.png', 'hgfgh', '2025-01-21 05:39:56', '2025-01-21 05:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '0001_01_01_000000_create_users_table', 1),
(6, '0001_01_01_000001_create_cache_table', 1),
(7, '0001_01_01_000002_create_jobs_table', 1),
(8, '2024_08_13_102039_add_users_table', 1),
(9, '2025_01_20_112156_create_fast_facts_table', 2),
(10, '2025_01_21_071318_create_why_studies_table', 3),
(11, '2025_01_21_094623_create_medium_of_teachings_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cfySsDcLvd7Is7qVfpUiElnYewppu6w0CGyZpdoo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNjFPNERJSXl0ZXcycTR0Q1Q2WDFHcWxkTFRjSEM3N3RkeWxRM3FIMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1738587716),
('OE8LNQbFmM0UjNCETozAZXGuVLdBCbHTa8CDOvjg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSk9jNUZRaXcwMktVWjVGS29Pbk9qNkUybjh2dTJPM3JLVXdtd1N1OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738643975);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `content` longtext DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(50) DEFAULT 'about_us'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `content`, `image1`, `image2`, `created_at`, `updated_at`, `type`) VALUES
(1, '<h2><strong>The Admission Advisor</strong></h2><h3><strong>The most trusted study abroad consultants in India</strong></h3><p>We at The Admission Advisor specializes in helping Indian medical students pursue their dreams of becoming doctors in foreign countries. We have a team of experienced and qualified counsellors who can guide you through the entire process of applying, preparing, and settling in your chosen destination.</p><p>Whether you want to study in the Europe, Russia, China or any other country, we can help you find the best options for your budget, academic profile, and career goals. Our services include admission counselling, visa assistance, scholarship guidance, pre-departure orientation, and post-arrival support. Contact us today and let us help you achieve your medical aspirations abroad.</p><p><br></p>', 'about_us_images1/MJi8DSHKHU5BLGsOhnEK58uqIFM882NGJhywkJBI.jpg', 'about_us_images2/eqH7DakI1vj7OgAtI60wRBAoqf1URIZ0H8YraxAu.jpg', '2024-12-06 04:16:41', '2025-02-03 06:12:22', 'about_us'),
(2, '<h2><strong>The Admission Advisor</strong></h2><h3><strong>Best Countries to Study MBBS Abroad</strong></h3><p>It\'s an adventure! Leaving one\'s country and going abroad to study isn’t easy. However, for medical students, there are many benefits to studying overseas (outside India).</p><p>Here are some reasons why you should pursue medical/MBBS education outside of India. However, ensure that you apply to great countries and good universities since the standards of education may vary.</p><p><strong style=\"color: rgb(0, 71, 178);\">1. CULTURAL EXPOSURE</strong></p><p><strong style=\"color: rgb(0, 71, 178);\">2. GLOBAL NETWORKING</strong></p><p><strong style=\"color: rgb(0, 71, 178);\">3. QUALITY EDUCATION</strong></p><p><strong style=\"color: rgb(0, 71, 178);\">4. PERSONAL GROWTH</strong></p>', 'why_study_mbbs_abroad/KjoiUmRTPCNem7FyGKSuf0creJ6hq9i6RUMnqvtB.png', NULL, '2024-12-06 04:54:26', '2025-01-31 05:28:47', 'why_study_mbbs_abroad'),
(4, 'This is the third About Us data.', 'about_us_image3.jpg', NULL, '2024-12-06 04:54:26', '2024-12-06 04:54:26', 'about_us'),
(5, '<h2><strong>📜 Privacy Policy</strong></h2><p><strong>Last Updated:</strong></p><h3><strong>1. Introduction</strong></h3><p>The Admission Advisor is committed to protecting your privacy. This policy explains how we collect, use, and safeguard your personal information when you use our website.</p><h3><strong>2. Information We Collect</strong></h3><p>We may collect the following types of information:</p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Personal Information:</strong> Name, email, phone number, etc.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Academic Details:</strong> Course preferences, past education details, etc.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Technical Data:</strong> IP address, browser type, and website usage data.</li></ol><h3><strong>3. How We Use Your Information</strong></h3><p>We use your information for:</p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Processing student applications and guiding admissions.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Sending relevant updates, offers, and notifications.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Improving our website and services.</li></ol><h3><strong>4. Data Protection &amp; Security</strong></h3><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>We implement strict security measures to protect your data.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Your personal information is never shared with third parties without consent.</li></ol><h3><strong>5. Cookies &amp; Tracking Technologies</strong></h3><p>We use cookies to enhance user experience and analyze website traffic. You can disable cookies in your browser settings.</p><h3><strong>6. Third-Party Links</strong></h3><p>Our website may contain links to external websites. We are not responsible for their privacy policies.</p><h3><strong>7. Your Rights</strong></h3><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>You can request access, correction, or deletion of your personal data.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>You may opt out of receiving marketing emails.</li></ol><h3><strong>8. Changes to This Policy</strong></h3><p>We may update this policy from time to time. Changes will be posted on this page.</p><h3><strong>9. Contact Us</strong></h3><p>For any privacy-related concerns, contact us at:</p><p>📧 <strong>Email: contact@addminssion.com</strong></p><p>📞 <strong>Phone:</strong> +91 9878987887</p><p><br></p>', NULL, NULL, '2025-02-03 10:53:26', '2025-02-03 06:19:39', 'privacypolicy'),
(6, '<h2><strong>📑 Terms &amp; Conditions</strong></h2><p><strong>Last Updated:</strong></p><h3><strong>1. Acceptance of Terms</strong></h3><p>By using The Admission Advisor website, you agree to these Terms &amp; Conditions.</p><h3><strong>2. Services Offered</strong></h3><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>We provide information on foreign colleges, universities, and courses.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>We assist students with the admission process.</li></ol><h3><strong>3. User Responsibilities</strong></h3><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Provide accurate and complete information.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Do not misuse the website or its content.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Respect intellectual property rights.</li></ol><h3><strong>4. Intellectual Property Rights</strong></h3><p>All website content (text, images, logos, etc.) is owned by The Admission Advisor and cannot be copied or distributed without permission.</p><h3><strong>5. Limitation of Liability</strong></h3><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>We strive for accurate information but do not guarantee completeness or correctness.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>We are not responsible for any admissions decisions made by universities.</li></ol><h3><strong>6. Third-Party Services</strong></h3><p>We may feature third-party services. We are not liable for their policies or actions.</p><h3><strong>7. Changes to Terms</strong></h3><p>We may update these terms without prior notice. Users should review them regularly.</p><h3><strong>8. Termination of Access</strong></h3><p>We reserve the right to block users violating our terms.</p><h3><strong>9. Contact Us</strong></h3><p>For any questions, contact:</p><p>📧 <strong>Email: contact@addminssion.com</strong></p><p>📞 <strong>Phone:</strong> +91 9878987887</p><p><br></p>', 'tearms_conditions', NULL, '2025-02-03 11:00:15', '2025-02-03 06:19:21', 'tearms_conditions');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `subheading` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `heading`, `subheading`, `url`, `background_image`, `created_at`, `updated_at`) VALUES
(2, 'STUDY IN TOP MEDICAL', 'UNIVERSITIES OF ABROAD', 'https://www.instagram.com/reel/C8hDfvgo7pd/?igsh=MWR2dTQ2OWpoaWd0bg==', 'slider_images/dlor1ChipWrbibxSolOFYNjUGQXOkdgizSBnfG4j.jpg', '2024-12-05 03:33:35', '2024-12-29 23:30:32'),
(3, 'UNIVERSITY SLIDERS MANAGEMENT', 'WELCOME TO THE SLIDER MANAGEMENT PANEL! CREATE, EDIT', 'https://www.instagram.com/reel/C8hDfvgo7pd/?igsh=MWR2dTQ2OWpoaWd0bg==', 'slider_images/eBryUpetH9zbtMdedkAK1l0aKlepGKQWtxa7Ik9r.jpg', '2024-12-05 03:34:35', '2024-12-29 23:30:52'),
(4, '\"DYNAMIC UNIVERSITY BANNERS\"', 'FROM SHOWCASING ACHIEVEMENTS TO PROMOTING EVENTS', 'https://www.instagram.com/reel/C8hDfvgo7pd/?igsh=MWR2dTQ2OWpoaWd0bg==', 'slider_images/vqb5kQwpaYTXnogVYJT9Ss2QFMSrAVhDBK6lAeK3.jpg', '2024-12-05 03:52:09', '2024-12-29 23:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `created_at`, `updated_at`) VALUES
(12, 'vikaskesar@gmail.com', '2024-12-20 06:09:34', '2024-12-20 06:09:34'),
(21, 'vikaskesar575@gmail.com', '2024-12-20 06:39:15', '2024-12-20 06:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `paragraph` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `paragraph`, `image`, `created_at`, `updated_at`) VALUES
(4, 'Saurabhkesar', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'testimonials/3QkeAt7CF78HKAMMEDMvdSWW3tuElXNPMVizLVkU.png', '2024-12-04 04:30:32', '2025-01-10 07:06:23'),
(6, 'vikas kesar', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'testimonials/BtdmESBXSY2hpBfJMJS1fKgvBYtgjIZvVD3Szt0G.png', '2024-12-04 04:46:04', '2025-01-10 07:06:39'),
(7, 'mohan Singh', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'testimonials/PhHjSdSDG7CVhORFIyg9fegZhLADBAKOIjjOz5rv.png', '2024-12-04 04:46:29', '2025-01-10 07:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `established` year(4) NOT NULL,
  `mci_status` enum('Approved','Not Approved') NOT NULL,
  `official_website` varchar(255) NOT NULL,
  `country_reference_id` bigint(20) UNSIGNED NOT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `university_logo` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ownership` enum('private','autonomous','deemed','partnership','government') DEFAULT NULL,
  `courses` text DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` text DEFAULT NULL,
  `faqs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`faqs`)),
  `video_urls` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`video_urls`)),
  `brochure` varchar(255) DEFAULT NULL,
  `photo_gallery` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `university_name`, `slug`, `established`, `mci_status`, `official_website`, `country_reference_id`, `content`, `image`, `university_logo`, `status`, `course_id`, `created_at`, `updated_at`, `ownership`, `courses`, `seo_title`, `seo_description`, `seo_keywords`, `faqs`, `video_urls`, `brochure`, `photo_gallery`) VALUES
(29, 'Delhi University a central university', 'delhi-university-a-central-university', '2013', 'Approved', 'https://www.medicalabroad.org/china/anhui-medical-university/', 13, '<p><br></p><p><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">A university is&nbsp;</span><span style=\"color: inherit; background-color: rgb(255, 255, 255);\">a higher education institution that offers degrees and research opportunities</span><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">.&nbsp;Universities are usually larger than colleges and offer a broader range of programs.&nbsp;</span></p><p><br></p><p><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">What universities offer:</span></p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Undergraduate degrees</strong><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">:&nbsp;Typically last three to four years and result in a bachelor\'s degree&nbsp;</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Graduate and professional degrees</strong><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">:&nbsp;Offered in addition to undergraduate degrees&nbsp;</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Research opportunities</strong><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">:&nbsp;Universities are places where academic research is conducted&nbsp;</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Extracurricular activities</strong><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">:&nbsp;Universities offer a dynamic campus life with many extracurricular activities&nbsp;</span></li></ol><p><br></p><p><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">What universities are like:</span></p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Universities are usually made up of a college of liberal arts and sciences, graduate schools, and professional schools&nbsp;</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Universities are places where students can gain more knowledge and skills&nbsp;</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Universities are places where students can study for degrees in various fields of study</span></li></ol><p><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">How do people get to university?:</span></p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">People typically attend university after finishing 12 years of schooling&nbsp;</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Some people go straight to university, while others take a gap year&nbsp;</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Some people attend university later in life, known as mature students&nbsp;</span></li></ol><p><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Where did universities originate?:&nbsp;</span></p><p><br></p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Universities originated in Europe during the Middle Ages, but they existed in some parts of Asia and Africa in ancient times</span></li></ol>', 'images/o44WekYZ3vwYgga9SQEUiOqnHPlerD8MQAUkn83P.png', 'logos/N1ZiF7gbAEECcxet45N2gIV0xQuaEE5HBcu47tFs.png', 'active', NULL, '2025-01-30 23:14:56', '2025-02-03 01:17:05', 'government', '1', 'mbbs collage', 'A university is a higher education institution that offers degrees and research opportunities. Universities are usually larger than colleges and offer a broader range of programs.', '[{\"value\":\"univertsities\"},{\"value\":\"top univertsities\"},{\"value\":\"NEET\"},{\"value\":\"MBBS\"}]', '\"[{\\\"question\\\":\\\"Are scholarships available for international students?\\\",\\\"answer\\\":\\\"What universities are like:\\\\r\\\\nUniversities are usually made up of a college of liberal arts and sciences, graduate schools, and professional schools\\\"},{\\\"question\\\":\\\"Universities are places where students can gain more knowledge and skills\\\\u00a0 Universities are places where students can study for degrees in various fields of study How do people get to university?: People typically attend university after finishing 12 years of schooling\\\\u00a0 Some people go straight to university, while others take a gap year\\\\u00a0 Some people attend university later in life, known as mature students\\\\u00a0 Where did universities originate?:\\\\u00a0  Universities originated in Europe during the Middle Ages, but they existed in some parts of Asia and Africa in ancient times\\\",\\\"answer\\\":\\\"Universities are places where students can gain more knowledge and skills\\\\u00a0\\\\r\\\\nUniversities are places where students can study for degrees in various fields of study\\\\r\\\\nHow do people get to university?:\\\\r\\\\nPeople typically attend university after finishing 12 years of schooling\\\\u00a0\\\\r\\\\nSome people go straight to university, while others take a gap year\\\\u00a0\\\\r\\\\nSome people attend university later in life, known as mature students\\\\u00a0\\\\r\\\\nWhere did universities originate?:\\\\u00a0\\\\r\\\\n\\\\r\\\\nUniversities originated in Europe during the Middle Ages, but they existed in some parts of Asia and Africa in ancient times\\\"}]\"', '[\"https:\\/\\/www.youtube.com\\/embed\\/m-kh0pQ093k?si=TDkh7TzASbsk4ruX\",\"https:\\/\\/www.youtube.com\\/embed\\/nFlgR9Ro650?si=k4JeG11COBRAlX0O\"]', 'brochures/l7yRGMEXtzgZgKQVw7BGVfJh7mciCWVcCJGQwpYP.pdf', '[\"gallery\\/monjltlyH5DJyDx0YJjF47FgA1J8s22e0EpcfChR.jpg\",\"gallery\\/tLuUARdcWf7SYiab5IsytOc0L577UaInINp9OxgN.png\",\"gallery\\/ljzfBiwLlhkYtTyqylCaWqAhPEhVRIQFsFMCoSkA.jpg\",\"gallery\\/MmtgbaGvgvbs6prkrSXZ610zYYefPJb6EUQ2Ydwp.jpg\",\"gallery\\/Hg0QHd1yu74l2ICHehcNjmV2RzcwIM7tFVQlOi5G.jpg\"]'),
(30, 'University | Definition, Origin, History, & Facts | Britannica', 'university-definition-origin-history-facts-britannica', '2012', 'Approved', 'https://www.medicalabroad.org/china/anhui-medical', 19, '<p>What universities offer:</p><p>Undergraduate degrees:&nbsp;Typically last three to four years and result in a bachelor\'s degree&nbsp;</p><p>Graduate and professional degrees:&nbsp;Offered in addition to undergraduate degrees&nbsp;</p><p>Research opportunities:&nbsp;Universities are places where academic research is conducted&nbsp;</p><p>Extracurricular activities:&nbsp;Universities offer a dynamic campus life with many extracurricular activities&nbsp;</p><p><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">A university is&nbsp;</span><span style=\"color: inherit; background-color: rgb(255, 255, 255);\">a higher education institution that offers degrees and research opportunities</span><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">.&nbsp;Universities are usually larger than colleges and offer a broader range of programs.&nbsp;</span></p><p><br></p><p><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">What universities offer:</span></p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Undergraduate degrees</strong><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">:&nbsp;Typically last three to four years and result in a bachelor\'s degree&nbsp;</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Graduate and professional degrees</strong><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">:&nbsp;Offered in addition to undergraduate degrees&nbsp;</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Research opportunities</strong><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">:&nbsp;Universities are places where academic research is conducted&nbsp;</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Extracurricular activities</strong><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">:&nbsp;Universities offer a dynamic campus life with many extracurricular activities&nbsp;</span></li></ol><p><br></p><p><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">What universities are like:</span></p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Universities are usually made up of a college of liberal arts and sciences, graduate schools, and professional schools&nbsp;</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Universities are places where students can gain more knowledge and skills&nbsp;</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Universities are places where students can study for degrees in various fields of study</span></li></ol><p><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">How do people get to university?:</span></p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">People typically attend university after finishing 12 years of schooling&nbsp;</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Some people go straight to university, while others take a gap year&nbsp;</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Some people attend university later in life, known as mature students&nbsp;</span></li></ol><p><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Where did universities originate?:&nbsp;</span></p><p><br></p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"color: var(--m3c11); background-color: rgb(255, 255, 255);\">Universities originated in Europe during the Middle Ages, but they existed in some parts of Asia and Africa in ancient times</span></li></ol>', 'images/7xLK1XgHWHaXxqA5Wp8rHkoqFO0oyYdwl0loSwdS.jpg', 'logos/fkJVoh51mICuiJNWpDOxCTnOQRSSnCEpiULjCtZ5.png', 'active', NULL, '2025-01-30 23:17:58', '2025-02-03 06:14:30', 'private', '2', 'mbbs collage', 'Universities originated in Europe during the Middle Ages, but they existed in some parts of Asia and Africa in ancient times', '[{\"value\":\"NEEt\"},{\"value\":\"UNIversities\"},{\"value\":\"MBBS\"}]', '\"[{\\\"question\\\":\\\"Are scholarships available for international students?\\\",\\\"answer\\\":\\\"Universities are places where students can gain more knowledge and skills\\\\u00a0\\\\r\\\\nUniversities are places where students can study for degrees in various fields of study\\\\r\\\\nHow do people get to university?:\\\"},{\\\"question\\\":\\\"Universities originated in Europe during the Middle Ages, but they existed in some parts of Asia and Africa in ancient times\\\",\\\"answer\\\":\\\"People typically attend university after finishing 12 years of schooling\\\\u00a0\\\\r\\\\nSome people go straight to university, while others take a gap year\\\\u00a0\\\\r\\\\nSome people attend university later in life, known as mature students\\\\u00a0\\\\r\\\\nWhere did universities originate?:\\\"}]\"', '[\"https:\\/\\/www.youtube.com\\/embed\\/m-kh0pQ093k?si=TDkh7TzASbsk4ruX\",\"https:\\/\\/www.youtube.com\\/embed\\/m-kh0pQ093k?si=TDkh7TzASbsk4ruX\",\"https:\\/\\/www.youtube.com\\/embed\\/nFlgR9Ro650?si=k4JeG11COBRAlX0O\"]', 'brochures/WEtmWbgkFCTBi8ES8wg0XOvvQIslbZzjxS40lVaB.pdf', '[\"gallery\\/QOEppCBnXdHIwFoiJPSfQcFM740xc0btRn7OG3hi.jpg\",\"gallery\\/NyHfgPjC4fEOdRxy2cKkLu6Wybxy9c1HgNfEmvzE.jpg\",\"gallery\\/ePBPsYBjzqlSwe3NGS99fOHCRRrJy9SUdtTysI2v.png\",\"gallery\\/Rftq6jSJusT3p1IsBWBAh5zS1hMwNKEQ2AWrVFm4.jpg\",\"gallery\\/AYd5HXSM908RdrPuwcKXJvJ5ZTFYuKMAIJMA1QnD.png\"]'),
(31, 'Study MBBS in Chin', 'study-mbbs-in-chin', '2020', 'Approved', 'https://chatgpt.com/c/675bb35d-cd2c-8010-bd4e-9d00c506b88d', 13, '<p><strong>Full Form</strong>: MBBS stands for Bachelor of Medicine, Bachelor of Surgery.</p><p><strong>Duration</strong>: The course typically lasts 5 to 6 years, including an internship year.</p><p><strong>Eligibility</strong>:</p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Completion of 12th grade with science subjects (Physics, Chemistry, Biology).</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Passing medical entrance exams like NEET (National Eligibility cum Entrance Test).</li></ol><p><strong>Subjects Covered</strong>:</p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Anatomy, Physiology, Biochemistry, Pathology, Pharmacology, Microbiology, Surgery, Medicine, Obstetrics, and Gynecology.</li></ol><p><strong>Internship</strong>: One year of hands-on clinical practice in hospitals after completing the academic part of the course.</p><p><strong>Career Options</strong>:</p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Becoming a general practitioner or specialist doctor.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Pursuing higher studies like MD (Doctor of Medicine) or MS (Master of Surgery).</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Teaching in medical colleges or engaging in medical research.</li></ol><p><strong>Skills Developed</strong>: Diagnosis, treatment, medical ethics, patient care, and preventive healthcare.</p><p><strong>Global Recognition</strong>: MBBS is recognized globally, making it a sought-after qualification for aspiring doctors worldwide.</p>', 'images/mhd8Y1VwRI3cxFsikFim7tjA9rwgnx5B2e2Ia77E.jpg', 'logos/fbpGktnOFxarqiEvYuEsSmRs8utjYXC3gjqG7Y6x.png', 'active', NULL, '2025-01-30 23:25:31', '2025-01-31 01:16:11', 'autonomous', '1', 'yryrt', 'yrty64564', '[{\"value\":\"yrty\"},{\"value\":\"547456\"}]', '\"[{\\\"question\\\":\\\"6464\\\",\\\"answer\\\":\\\"65546\\\"},{\\\"question\\\":\\\"Are scholarships available for international students?\\\",\\\"answer\\\":\\\"654hfghffgh\\\"}]\"', '[\"https:\\/\\/www.youtube.com\\/embed\\/m-kh0pQ093k?si=TDkh7TzASbsk4ruX\",\"https:\\/\\/www.youtube.com\\/embed\\/nFlgR9Ro650?si=k4JeG11COBRAlX0O\"]', NULL, '[\"gallery\\/Gf52vkXimNhDKvWAhR0zB0UUPOKl5mrsAReRDL0X.jpg\",\"gallery\\/suBFuXKJrNG8hUvyMRTTl79LIPDgmMS1SvkTah71.jpg\",\"gallery\\/q7bUylkdWXxEPX6gY2uNY20DTVTMGtEKfmcRalue.jpg\",\"gallery\\/c9KGi25ZPuwrZ6YqZczOZKthZ8s9ld4WIfKadVXG.jpg\"]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('customer','admin') NOT NULL DEFAULT 'customer',
  `about` text DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `about`, `profile_picture`) VALUES
(1, 'vikas kesar', 'admin@gmail.com', NULL, '$2y$12$mbkg9rKmDS1ganAj7gy6yeeYqVQZOS1p3VVKtGYedrIjSkt5uBfgm', NULL, NULL, '2025-01-20 04:19:33', 'admin', NULL, 'profile_pictures/m2FwfliDh2Hn7x9AReQ4BNWtegDLSXaDkTUHeKOH.webp'),
(2, 'vikas', 'admn@gmail.com', NULL, '$2y$12$mbkg9rKmDS1ganAj7gy6yeeYqVQZOS1p3VVKtGYedrIjSkt5uBfgm', NULL, '2025-01-08 07:07:44', '2025-01-08 07:07:44', 'customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us`
--

CREATE TABLE `why_choose_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header` varchar(255) NOT NULL,
  `paragraph` text NOT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `why_choose_us`
--

INSERT INTO `why_choose_us` (`id`, `header`, `paragraph`, `background_image`, `created_at`, `updated_at`) VALUES
(4, '18+ Years in Service', 'We’ve been recruiting students to foreign universities\r\nsince 2006, gaining experience and earning trust of thousands of students and helping them pursue their MBBS dreams.', 'why_choose_us/plZmEVYroQqKMMvka8qbSF2EGLj2DuLiYiw1VPTn.jpg', '2024-12-04 02:12:26', '2025-01-20 04:28:44'),
(6, '3000+ Students', 'We have a track record of success, with thousands of satisfied students who have graduated from top medical universities around the world.', 'why_choose_us/qAPdKB5ZretnfJRIzygu88UPxMPn0GPv8xdowpFq.png', '2024-12-04 02:28:56', '2025-01-20 04:26:45'),
(7, '100% Visa Success Rate', 'We have achieved close to 100% visa success. Nearly every student enrolled through us got his visa on time.', 'why_choose_us/0tr3cVm89qPSro663TJUcMbcUDunfgeAP2joEaYn.jpg', '2024-12-04 02:29:23', '2025-01-20 04:26:58'),
(8, 'Wide Range of Options', 'We have a wide range of options and opportunities\r\nfor you to choose from, covering various countries,\r\nuniversities, courses, and scholarships.', 'why_choose_us/AgQisYOCAJeVVhkvHST8UGeLzJiVCOf3NWKJSccs.png', '2024-12-04 02:29:47', '2025-01-20 04:27:09'),
(9, 'Commitment', 'We have a passion for education and a commitment to\r\nexcellence, we leave no stone unturned to keep up with\r\nwhat we commit. We do not make fake promises and\r\nonly commit what we can achieve.', 'why_choose_us/GTKOt6g5GCOFDroe2QboJLf39BIrW60qEHTX5oux.png', '2024-12-04 02:30:10', '2025-01-20 04:27:21'),
(10, 'Responsibility', 'Apart from the pre-admission guidance, we\r\ntake responsibility to help you throughout\r\nyour study program.', 'why_choose_us/qDZ0I8Ypr2GhUQaECqgTthfNspulUhvtUFaUteGW.jpg', '2024-12-04 02:31:37', '2025-01-20 04:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `why_studies`
--

CREATE TABLE `why_studies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_universities_details_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `sub_heading` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_studies`
--

INSERT INTO `why_studies` (`id`, `country_universities_details_id`, `image`, `heading`, `sub_heading`, `created_at`, `updated_at`) VALUES
(8, 19, 'why_study_icons/3uR9aUV3qJbFlT1ZitX3mTqba0Dd63j8jLLUoQ2R.png', 'ddd', 'eeee', NULL, NULL),
(11, 21, 'why_study_icons/u7BBAtc5F71RL1w318Y7ucVhoaCD21tMrqBW3Ynp.png', 'asdsfd', 'sfdfd', NULL, NULL),
(12, 13, 'fast_facts/mGKpjhdqGdq4tXo7MWQgOMDVhlcAXkuf9ikqvU01.jpg', 'khjk', 'jhkjhkhjk', '2025-01-21 05:36:51', '2025-01-21 05:36:51'),
(13, 13, 'fast_facts/WyeH8r1nuxzGmZiuWtJ6RTO2JPpx6HxvwF92Im8N.jpg', 'gj', 'hjkhjk', '2025-01-21 05:36:51', '2025-01-21 05:36:51'),
(14, 21, 'fast_facts/MkUVBj2AxZgUKFX3btpd093m3e92oxnIxJIB4ASz.png', 'hghf', 'fghfghfg', '2025-01-21 05:39:56', '2025-01-21 05:39:56'),
(15, 13, 'fast_facts/lkG1k0fK0yEcbk5RIcYgTjO3IxAqOWaMs361MrFx.jpg', 'hii', 'hello', '2025-01-31 00:00:23', '2025-01-31 00:00:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_universities_details`
--
ALTER TABLE `country_universities_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_university`
--
ALTER TABLE `course_university`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_university_course_id_foreign` (`course_id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fast_facts`
--
ALTER TABLE `fast_facts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fast_facts_country_universities_details_id_foreign` (`country_universities_details_id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide_every_steps`
--
ALTER TABLE `guide_every_steps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medium_of_teachings`
--
ALTER TABLE `medium_of_teachings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medium_of_teachings_country_universities_details_id_foreign` (`country_universities_details_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_reference_id` (`country_reference_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_studies`
--
ALTER TABLE `why_studies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `why_studies_country_universities_details_id_foreign` (`country_universities_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `country_universities_details`
--
ALTER TABLE `country_universities_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `course_university`
--
ALTER TABLE `course_university`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fast_facts`
--
ALTER TABLE `fast_facts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guide_every_steps`
--
ALTER TABLE `guide_every_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medium_of_teachings`
--
ALTER TABLE `medium_of_teachings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `why_studies`
--
ALTER TABLE `why_studies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `course_university`
--
ALTER TABLE `course_university`
  ADD CONSTRAINT `course_university_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fast_facts`
--
ALTER TABLE `fast_facts`
  ADD CONSTRAINT `fast_facts_country_universities_details_id_foreign` FOREIGN KEY (`country_universities_details_id`) REFERENCES `country_universities_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `medium_of_teachings`
--
ALTER TABLE `medium_of_teachings`
  ADD CONSTRAINT `medium_of_teachings_country_universities_details_id_foreign` FOREIGN KEY (`country_universities_details_id`) REFERENCES `country_universities_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_ibfk_1` FOREIGN KEY (`country_reference_id`) REFERENCES `country_universities_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `universities_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `why_studies`
--
ALTER TABLE `why_studies`
  ADD CONSTRAINT `why_studies_country_universities_details_id_foreign` FOREIGN KEY (`country_universities_details_id`) REFERENCES `country_universities_details` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
