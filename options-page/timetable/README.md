# Timetable Plugin for WordPress

A WordPress plugin to manage and display a timetable for services or events. This plugin allows you to create and manage timetable entries via a settings page in the WordPress admin dashboard.

## Overview

This plugin provides:

- **Custom Settings Page**: Provides an interface to input timetable data.

## Features

- Add, edit, and remove timetable entries.
- Input days, times, and service descriptions.
- Validate time formats and ensure data consistency.

## Files

- `callback.php`: Contains functions for generating and handling timetable form fields.
- `sanitizing.php`: Contains functions for sanitizing and validating input data.
- `timetable_menu.php`: Registers the timetable settings page in the WordPress admin menu.
- `timetable_page.php`: Defines the HTML structure of the timetable settings page.
- `timetable_settings.php`: Registers settings and fields for the timetable in WordPress.

## JavaScript and CSS Integration

The plugin includes JavaScript and CSS to enhance the user interface:

- **JavaScript**: Handles adding/removing timetable rows dynamically and validates time formats.
- **CSS**: Styles the timetable form and validation messages.
