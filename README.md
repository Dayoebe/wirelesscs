# Wireless Computer Services Website

The official website of **Wireless Computer Services**, built with Laravel.

This project powers the digital presence of Wireless Computer Services and provides a content-driven platform for publishing posts, organizing content by category, handling newsletter subscriptions, and presenting important company information in a clean and modern web experience.

---

## Table of Contents

- [Overview](#overview)
- [Project Purpose](#project-purpose)
- [Core Features](#core-features)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Getting Started](#getting-started)
- [Installation](#installation)
- [Environment Setup](#environment-setup)
- [Database Setup](#database-setup)
- [Run the Project](#run-the-project)
- [Useful Commands](#useful-commands)
- [Live Website](#live-website)
- [Roadmap](#roadmap)
- [Contributing](#contributing)
- [License](#license)
- [Author](#author)

---

## Overview

This repository contains the source code for the official Wireless Computer Services website.

It is built as a Laravel-based web application that supports content publishing, structured page routing, search, subscriptions, and user-related features. The project reflects a practical business website with content management capabilities and room for growth into a larger digital platform.

---

## Project Purpose

Wireless Computer Services is a technology brand focused on digital solutions, learning, and business growth.

This website was built to serve as the official online presence of the brand by providing:

- a professional digital identity
- a platform for publishing posts and updates
- category-based content organization
- a search experience for visitors
- a newsletter subscription system
- informational pages about the brand and its policies

The overall goal is to create a scalable and maintainable website that supports visibility, communication, and growth.

---

## Core Features

Based on the current project structure and routes, the application includes support for:

- homepage and public post listing
- single post pages
- category-based content browsing
- search functionality
- owner/profile page
- about page
- contact page
- privacy policy page
- terms and conditions page
- content guideline page
- newsletter subscribe and unsubscribe
- RSS/feed support
- sitemap generation
- authentication and email verification
- dashboard access for authenticated users
- profile management

---

## Tech Stack

This project is built with the following technologies:

### Backend
- Laravel 10
- PHP 8.1+
- Livewire 3
- Laravel Sanctum
- Laravel UI

### Frontend
- Blade
- HTML
- Tailwind CSS
- Alpine.js
- Bootstrap 5
- Sass
- JavaScript
- Vite

### Packages
- Spatie Laravel Permission
- Spatie Laravel Cookie Consent

### Database
- MySQL or SQLite

### Development Tools
- Composer
- NPM
- Git
- GitHub

---

## Project Structure

```bash
wirelesscs/
├── app/
├── bootstrap/
├── config/
├── database/
├── lang/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── wirelesscs/
├── .env.example
├── artisan
├── composer.json
├── package.json
├── phpunit.xml
├── postcss.config.js
├── tailwind.config.js
├── vite.config.js
└── wireless (2).sql
