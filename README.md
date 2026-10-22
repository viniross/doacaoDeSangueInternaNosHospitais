<div align="right">
  🇺🇸 <strong>English</strong> | <a href="README.pt.md">🇧🇷 Português</a>
</div>

# IBDHosp - Internal Blood Donation Campaign in Hospitals

## Overview

IBDHosp (Internal Blood Donation in Hospitals) is a research and web development project created to encourage blood donation by people who are already in the hospital environment, such as companions, visitors, or patients awaiting procedures.

The project was born from the realization that blood centers face a chronic difficulty in maintaining their blood supplies. Our innovative approach seeks to optimize donor capture by focusing on an audience already physically present in hospitals, making the act of donating more convenient and accessible.

This web platform serves as the digital face of the campaign, acting as a functional prototype (MVP). The system perfectly simulates the registration flow through a form and displays charts generated with mock data for the homologation and validation of the software's functionalities. It should be noted that, as this is an academic research project in a controlled environment, real data collection with patients or visitors inside hospitals was not carried out.

<p align="center">
  <img src="assets/images/interface-graficos.jpg" alt="IBDHosp System Interface" width="700">
</p>

## Corporate & Research Impact
- **Executive Pitch:** The business model and platform were presented in a pitch to **ATRION** (Hospital Moinhos de Vento's Innovation Center). [Click here to view the Pitch slides](./docs/pitch-ibdhosp.pdf).
- **Corporate Presentation:** The system was demonstrated in an auditorium to over 70 professionals from various sectors of **Unimed Porto Alegre**.
- **Scientific Validation:** The development culminated in the writing of a scientific paper, validated and exhibited in two consecutive editions of technical fairs. 
  * [Click here to read the Scientific Paper](./docs/artigo-cientifico-ibdhosp.pdf)
  * [Click here to view the Research Slides](./docs/apresentacao-pesquisa-feira.pdf)

<p align="center">
  <img src="assets/images/apresentacao-feira.jpg" alt="Technical Fair Presentation" width="500">
</p>

## Features

- **Home Page (`index.php`):** Presents the project's justification and displays dynamic charts with donation data, such as the age group of donors and hospitals with the most records.
- **Donation Form (`forms.html`):** Allows interested users to fill out a form, providing valuable data for research and blood center contact.
- **About Us (`sobre-nos.html`):** Introduces the project's developers.
- **Data Visualization:** Uses the Chart.js library to generate interactive charts that help visualize the donor profile and the campaign's reach.

## Technologies & Tools

- **Frontend:**
  - HTML5
  - CSS3
  - JavaScript
  - **Chart.js:** Library for creating charts.

- **Backend:**
  - PHP 8.0 (Client-Server Architecture)

- **Database:**
  - MySQL (via MariaDB)

- **Server:**
  - The project was developed and tested in a XAMPP environment.

## Project Structure

```text
/
├── action_page.php             # Processes form data
├── forms.html                  # Donation form page
├── index.php                   # Main page with charts
├── README.md                   # This file
├── sobre-nos.html              # About the developers page
├── assets/
│   ├── css/
│   │   ├── forms.css
│   │   ├── index.css
│   │   └── sobre-nos.css
│   ├── images/                 # Images and logos
│   └── js/
│       └── main.js             # JavaScript scripts
└── config/
    ├── config.php              # Database connection configuration
    └── database_schema.sql     # Database table creation script
```

## Database

The project uses a single table named `dados` to store the information collected in the form.

**`dados` Table Structure:**

```sql
CREATE TABLE `dados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `idade` varchar(255) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `doou` varchar(255) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `data` int(11) NOT NULL,
  `hora` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);
```

> **Homologation Note:** The table above was populated and tested exclusively with simulated mock data to validate database persistence, PHP communication, and dynamic rendering of Chart.js charts.

## How to Run the Project

1.  **Prerequisites:**
    - Have a local server environment such as XAMPP, WAMP, or MAMP installed.
    - Have a MySQL or MariaDB database server running.

2.  **Installation:**
    - Clone or download this repository to the `htdocs` directory (in the case of XAMPP) of your local server.
    - Create a new database in your phpMyAdmin (or another SQL client) named `ibdhosp`.
    - Import the `config/database_schema.sql` file into the `ibdhosp` database to create the `dados` table.
    - Check the `config/config.php` file and adjust the database connection credentials if necessary.

3.  **Access:**
    - Start the Apache and MySQL modules in your XAMPP control panel.
    - Open your browser and go to `http://localhost/doacaoDeSangueInternaNosHospitais/`.

## Developers

| Developer | GitHub | LinkedIn |
| :--- | :---: | :---: |
| **Vinícius Ross** | [![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/viniross) | [![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://linkedin.com/in/vinicius-ross) |
| **Lauro Vianna** | [![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/laurooo) | [![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/lauro-abad-vianna-665566240?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app) |
| **Matheus Cunha** | [![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/Matheus1464) | [![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/matheus-cunha-7b5347284?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app) |

---
*Project developed as part of the research on internal blood donation in hospitals (2023-2024).*
