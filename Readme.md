# YpreyLibray

![yprey](https://i.imgur.com/NFajooG.png)

**Created by [Fernando Mengali](https://www.linkedin.com/in/fernando-mengali-273504142/)**

YpreyLibrary is a framework based on library systems for borrowing and returning books for students and users. The framework perfectly simulates a library system but has vulnerabilities based on the OWASP TOP 10 WebApp 2021. The framework was developed to teach and learn details in Pentest (penetration testing) and Application Security. In the context of Offensive Security, vulnerabilities contained in web applications can be identified, exploited, and compromised. For application security professionals and experts, the framework provides an in-depth understanding of code-level vulnerabilities. Currently, Yprey is very valuable for educational, learning, and teaching purposes in the field of Information Security. For more information about the vulnerabilities, we recommend exploring the details available at [yrprey.com](https://yrprey.com).

#### Features
 - Based on OWASP's top 10 vulnerabilities for Web Application.

Initially, an unregistered user has access to minimal information about the framework, such as the Landing Page. The framework includes library functionalities for borrowing a book, returning it, etc. The framework was built based on vulnerabilities and is not recommended for commercial use, only for learning about exploitation and vulnerability fixing.

#### List of Vulnerabilities

In this section, we have a comparison of the vulnerabilities present in the framework with the routes and a comparison between the OWASP TOP 10 Web Application.
This table makes it easier to understand how to exploit vulnerabilities in each systemic function.
In the last two columns we have a parenthesis and the scenario associated with the OWASP TOP 10 Web Applications, facilitating the understanding of the theory described on the page https://owasp.org/www-project-top-ten/.
After understanding the scenario and the vulnerable route, the process of identifying and exploiting vulnerabilities becomes easier. If you are an Application Security professional, knowing the scenario and routes of endpoints makes the process of identifying and correcting vulnerabilities easier with manual Code Review Security techniques or automated SAST, SCA and DAST analyses

Complete table with points vulnerables, vulnerability details and a comparison between OWASP TOP 10 Web Application vulnerabilities:

|             **OWASP TOP 10**                          |**Method**|            **Path**            |            **Details**                            |
|:-----------------------------------------------------:|:--------:|:------------------------------:|:-------------------------------------------------:|
|     A01:2021-Broken Access Control                    |   GET    |  /admin.php?action=true        |      Bypass e Get access to admin panel           |
|     A03:2021-Injection                                |   GET    |  /logout.php?url=http://...    |          Redirect to other url                    |
|     A03:2021-Injection                                |   GET    |  remove_student.php            |          Remove Students - CSRF                   |
|     A03:2021-Injection                                |   POST   |  settings.php?id={number}      |          Change password - CSRF                   |
|     A03:2021-Injection                                |   GET    |  Inject XSS to page return.php |               XSS Reflect                         |
|     A05:2021-Security Misconfiguration                |   GET    |  /ftp/WS_FTP.LOG               |            Misconfiguration                       |
|     A05:2021-Security Misconfiguration                |   GET    |  /phpinfo.php                  |            Misconfiguration                       |
|     A05:2021-Security Misconfiguration                |   GET    |  /ssh-key.priv                 |            Misconfiguration                       |
|     A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/jquery-1.5.1.js           |  XSS to function: html,append,load,after..        |
|     A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/jquery-1.5.1.js           |  Prototype Pollution to function: extend          |
|     A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/lodash-3.9.0.js           |  Prototype Pollution to function: zipObjectDeep.. |
|     A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/lodash-3.9.0.js           |            Code Injection across template         |
|     A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/lodash-3.9.0.js           | ReDoS to functions: toNumber, trim, trimEnd       |
|     A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/bootstrap-4.1.3.js        | Prototype Pollution to function: data-template... |
|     A07:2021-Identif. and Authentication Failures     |   N/A    |  Change cache cookie to admin  |  Session Hijacking (Manipulation Cookie)          |

## How Install

* 1º - Install and configure Apache, PHP and MySQL on your Linux
* 2º - Import the YRpreyLibrary files to /var/www/
* 3º - Create a database named "yrpreybib"
* 4º - Import the yrprey.sql into the database.
* 5º - Access the address http://localhost in your browser

## Observation
You can test on Xampp or any other platform that supports PHP and MySQL.

## Reporting Vulnerabilities

Please, avoid taking this action and requesting a CVE!

The application intentionally has some vulnerabilities, most of them are known and are treated as lessons learned. Others, in turn, are more "hidden" and can be discovered on your own. If you have a genuine desire to demonstrate your skills in finding these extra elements, we suggest you share your experience on a blog or create a video. There are certainly people interested in learning about these nuances and how you identified them. By sending us the link, we may even consider including it in our references.
# yrpreyLibrary
