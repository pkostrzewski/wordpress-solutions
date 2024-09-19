# Custom Post Type: Events & Taxonomy: Year

Examples of registering a custom post type (CPT) for "Events" and a custom taxonomy called "Year" in WordPress. Additionally, this includes custom functionality for filtering events by year via AJAX and customizing allowed block types in Gutenberg editor.

## Overview

- **Custom Post Type (CPT)**: Events
- **Custom Taxonomy**: Year

## Files

- `create_events_cpt.php`: Registers the "Events" custom post type.
- `create_year_taxonomy.php`: Registers the "Year" taxonomy for the "Events" custom post type.
- `enqueue_events_scripts.php`: Enqueues AJAX scripts and localizes script variables for filtering events.
- `filter_posts_by_year.php`: Handles AJAX requests for filtering posts by year and outputs the filtered events or messages.
- `events_allowed_block_types.php`: Customizes allowed block types in the Gutenberg editor for the "Events" post type.

## Additional Functionality

### Enqueue Scripts and AJAX Handling

- **Function**: `enqueue_events_scripts()`
  - Enqueues the AJAX script for handling events filtering on the archive and singular event pages.
  - Localizes script variables for AJAX URL.

- **Function**: `filter_posts_by_year()`
  - Handles AJAX requests to filter "Events" by the selected year.
  - Outputs the filtered list of events or an appropriate message if no events are found for the selected year.

### Gutenberg Block Types

- **Function**: `events_allowed_block_types()`
  - Customizes the allowed block types for the "Events" post type in the Gutenberg editor.
  - Restricts or permits specific blocks to control editing experience.

