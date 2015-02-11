ClosedSocial
============

Close social networking project

This is our project for CS 3140

Participants are: Terrence Welsh
                  Joshua Frey

Instructor: Dr. Rob Green

This project can be found at

http://voyager.cs.bgsu.edu/cs3140rg/cs3140b2/project/login.php

You may login with my account, using:  freyjt@gmail.com   PW: nomatter

This project was a bit more ambitious than we were prepared for.  We gave ourselves
plenty of opportunity to scale back, and took that opportunity.

Right now it serves as a very nice shell for the vision that Terrence had in the start,
and I look forward to seeing it progress in the future.

What we wanted:  a meeting place for people who know each other to talk about topics important
 to them, without the pain of digressions.

What works:  We have what amounts to a message board right now.
             One can make a new thread, and expand the threads that are present.
               I've left in the comments and threads as they stand from testing, for both time constraints
               and humor :).
             We have also integrated this project into a mysql database, so threads will be stored from visit
               to visit.  The opportunity to use sessions was presented, and these control what an individual
               sees on the site

What doesn't work: the script to email a new password was never installed. Sacrificed to the gods of viewable comments.
                   The archiving that was integral to the original goal is not present.

Future plans:  Archiving threads to keep the homepage from becoming very cluttered very quickly is important
               Cleaning up the display to make a comfortable user experience is also on the short list.

Resources:  Much of the front end was developed after templates, and the user login was adapted from a cookbook solution
            presented in "PHP and MySQL for Dynamic Websites, 4th" by Larry Ullman.
            Of course we also used Jquery, and a bit of bootstrap for front-end processing and display.

Who did:  The front-end was entirely built by Terrence, with a few lines added for integration by myself.
          The backend was adapted and written by myself. Terrence and I met in the middle for writing the javascript to
          integrate the two, and test.

What's weird:  many of the php filenames exists as two completely different files in different folders.
               This is entirely my fault, as I began working with the backend scripts without remembering that the .html's
               would have to be renamed to run php on them.
               
               jQuery races out ahead of itself with ajax. We don't know how to deal with that.


