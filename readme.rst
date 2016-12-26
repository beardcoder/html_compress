EXT:html\_compress
==================

Easy to you html minifier by using wyrihaximus/html-compress.

Build Status
------------

.. image:: https://travis-ci.org/markussom/html_compress.svg?branch=master
   :target: https://travis-ci.org/markussom/html_compress

Requirements
------------

- TYPO3 7.6 - 8.x

Installation
------------

1) Install the extension by using the extension manager or by using composer ``composer require markussom/html-compress``.

TypoScript
----------

::

    config {
        ...
        compressBody = 1
        ...
    }

    OR

    page.config {
        ...
        compressBody = 1
        ...
    }

After this setting the body of you TYPO3 CMS Frontend is now minified

Contribute
----------
If you want to contribute to html\_compress.

1) Make an issue at https://github.com/markussom/html_compress/issues.
2) Fork the Repo and make you changes.
3) Create a pull request
4) Have fun :)

