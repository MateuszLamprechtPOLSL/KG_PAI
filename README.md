# Księga Gości

<h3 align="center">Księga Gości</h3>

  <p align="center">
  Księga Gości is a system that allows to manage persons currently visiting company. Main goal of this app is fullfilling requirements of RODO regulations, including expressing consents regarding the processing and management of personal data, and meeting the fire requirements for keeping records of persons present in the company. 
    <br /><br />
    <a href="https://github.com/MateuszLamprechtPOLSL/KG_PAI/"><strong>Link to repository»</strong></a>
    <br />
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

Księga Gości is a system that allows to manage persons currently visiting company. Main goal of this app is fullfilling requirements of RODO regulations, including expressing consents regarding the processing and management of personal data, and meeting the fire requirements for keeping records of persons present in the company. In this regard it allows to register guests with consents, proccesing information about purpose of visit, as well as convinient way to manage this informations, files and if necessary download list of current visitors.

<p align="right">(<a href="#top">back to top</a>)</p>



### Built With

This section lists major frameworks/libraries used to bootstrap project.

* [Bootstrap](https://getbootstrap.com)
* [JQuery](https://jquery.com)
* [MySQL](https://www.mysql.com)
* [PHP](https://www.php.net)
* [JS](https://www.javascript.com)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

To run this app you need to install XAMPP with default settings, which will serve as server and solution to manage database. You will also need to download code editor of your choose to adjust links, images, or/and consents. To start you also need to download a database template and import it within new database "goscie" created in localhost/phpmyadmin . Further more you need to create admin accounts in table administrator to be able to manage guests conviniently.

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

App has to approches, for guest and for admin.

#Guest

Guests are able to choose their purpose of visit. Based on that they will be redirected to appropriate consensts as well forms with basic informations like name, surname and company. After completing all informations and accepting consents which are required they will be registers. With that said provided information are transfered to part of the code that creates pdf files with all marked out informations and store them for legal required time. 

Second approach is admin panel which allows to manage infomations, add future guests so the time of registering would be shorter. It also provides three tables which are:
* List of current visitors - deleting record after guest leave; adding guest to List of permament visitors
* List of future visitors - with options to choose their language of preference which triggers app showed on another device to type previously filled informations, allowing guest to check them and accept consents; and delete record
* List of permament visitors - with option to copy regular visitors that already accept consents to List of current visitors; and delete record


<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Mateusz Lamprecht - mateusz.lamprecht@gmail.com

Project Link: [https://github.com/MateuszLamprechtPOLSL/KG_PAI/](https://github.com/MateuszLamprechtPOLSL/KG_PAI/)

<p align="right">(<a href="#top">back to top</a>)</p>

