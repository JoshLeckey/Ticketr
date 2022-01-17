ticktr \| Modern Ticket Support System
======================================

------------------------------------------------------------------------

-   [Getting Started](#line1)
-   [Types of Users](#line2)
-   [Admin Panel](#line3)
-   [Technologies Used](#line4)

Introduction

------------------------------------------------------------------------

-   **Item Name:** ticktr \| Modern Ticket Support System
-   **Item Version:** v 1.0
-   **Author:**

------------------------------------------------------------------------

First of all, we thank you for purchasing this script and hope it will
come to use!\
You are entitled to get free lifetime updates to this product +
exceptional support from us. Simply message us with any question!

This documentation is to help you start using the script.

#### Requirements

1.  Web Hosting
2.  Database

Be careful if you decide to edit the PHP source code. If not edited
properly, the script may break completely.\
No support is provided for faulty customization.

Getting Started

------------------------------------------------------------------------

#### Installation

1.  Upload all the files from the \"site\" folder on your server.
2.  Go to *yourdomain.com/install* and follow the steps of the
    installation wizard.

Once the script has been installed, you can log into the default admin
account that is created on installation.\
**Email: admin\@admin.com**\
**Password: admin1234**

Types of Users

------------------------------------------------------------------------

On the website there can be 3 types of users:

1.  Users
2.  Agents
3.  Admins

#### Users

Users can login, view their tickets and create new tickets.

#### Agents

Agents have the abillity to view the admin panel and access the
\"Tickets\" page in the admin panel. They can view any ticket and
respond to them. They also have the ability to use the \"Ticket Lookup\"
tool to view more information about a ticket when viewing it.\
They cannot access the **settings** page or the **users** page.

#### Admins

Admins have all the abillities of agents, but they can also view the
\"Settings\" page in the admin panel to change the website information,
add categories, and access the \"Users\" page to make other users agents
or admins.

Admin Panel

------------------------------------------------------------------------

If you want to want to use the Admin Panel, please do so on a computer
or a laptop. You might experience problems when using it on mobile.
:::

#### Changing site name

To change the site\'s name, go to the \"Admin Panel\" page, and click on
\"Settings\". You will then see an input for changing the site name.

#### Changing the logo and favicon

To change the logo or the favicon, go to the \"Admin Panel\" page, and
click on \"Settings\". You will see two upload buttons for the logo and
favicon.

#### Adding/Removing categories

To add or remove a category, go to the \"Admin Panel\" page, and click
on \"Settings\". Scroll down and you will see a list of current
categories, and two inputs, one to add categories and the other one to
remove categories. If you don\'t see your new category pop up after
adding one, please refresh the page.

#### Adding/Removing admins and agents

To add or remove an admin or agent, go to the \"Admin Panel\", and click
on \"Users\". You will see a list of all the registered users on your
site, and you will be able to turn any user you want into an agent or an
admin, or turn them into regular users.

#### Replying to tickets

Go to the \"Admin Panel\" page and click on \"Tickets\". You will see a
list of all the tickets made on the website. You can search by Name or
ID, or make it show only the opened tickets. The tickets are sorted by
default by oldest first, newest last.\
Click \"view\" on any ticket, and you can start replying to it.

#### Closing tickets

Go to the \"Admin Panel\" page and click on \"Tickets\". You will see a
list of all the tickets made on the website. You can search by Name or
ID, or make it show only the opened tickets. The tickets are sorted by
default by oldest first, newest last.\
Click \"close\" on any ticket, and it will get closed.

#### Opening closed tickets

Go to the \"Admin Panel\" page and click on \"Tickets\". You will see a
list of all the tickets made on the website. You can search by Name or
ID, or make it show only the opened tickets. The tickets are sorted by
default by oldest first, newest last.\
If a ticket is closed, instead of the normal \"Close\" button, it will
show an \"Open\" button. If you wish to re-open a closed ticket, please
click the \"Open\" button.

Technologies Used

------------------------------------------------------------------------

-   [Laravel](https://laravel.com/)
-   [TailwindCSS](https://tailwindcss.com/)
-   [jQuery](https://jquery.com/)
-   [SweetAlert2](https://sweetalert2.github.io/)
