# Sport Tracker Connector

## Overview

A set of tools to dump / upload / port workouts from / to online sport trackers.

Supported trackers:

* endomondo.com
* strava.com
* flow.polar.com
* strava.com


[![Build Status](https://travis-ci.org/dragosprotung/SportTrackerConnector.svg?branch=master)](https://travis-ci.org/dragosprotung/SportTrackerConnector)
[![Latest Stable Version](https://poser.pugx.org/dragosprotung/sport-tracker-connector/v/stable.svg)](https://packagist.org/packages/dragosprotung/sport-tracker-connector)
[![Dependency Status](https://www.versioneye.com/user/projects/53e54a8d35080d0053000072/badge.svg)](https://www.versioneye.com/user/projects/53e54a8d35080d0053000072)
[![License](https://poser.pugx.org/dragosprotung/sport-tracker-connector/license.svg)](https://packagist.org/packages/dragosprotung/sport-tracker-connector)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dragosprotung/SportTrackerConnector/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dragosprotung/SportTrackerConnector/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/71ffaadd-e86b-42d4-bf5f-0b44a80f80e0/mini.png)](https://insight.sensiolabs.com/projects/71ffaadd-e86b-42d4-bf5f-0b44a80f80e0)

## Installation

Install PHP 5.4 or newer and composer.

```sh
git clone https://github.com/dragosprotung/SportTrackerConnector.git
composer.phar install
```

## Configuration

Copy or rename *config.example.yml* to *config.yml*
Make sure you fill up the values with your credentials. Some trackers (ex. strava.com) have more complex authentication mechanism.
For that see help `connector help` for a list of specific tracker commands and help.

Example is strava.com: `connector strava:get-token`

## Usage

You will need to create a config.yml file and put in your credentials for the services.
You can rename and modify config.example.yml

Available commands for working with workouts:

* dump:workout     Fetch a workout from a tracker and save it to a file (gpx, json, etc).
* dump:multi      Fetch multiple workouts from a date interval with resume functionality.
* upload:sync     Copy a workout / multiple workouts from one tracker to another.
* upload:workout   Upload a workout file to a tracker.
