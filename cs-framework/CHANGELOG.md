# Codestar Framework Changelog

## PRE-RELEASE 1.0.2
- Added: Support for WP Nav Menus select
- Added: Taxonomy framework clear form elements after saving
- Added: A filter for external icon-jsons load
- Added: An action `cs_customize_options_config` for customize config options
- Added: Auto Class name for all fields and generating classname by field title
- Added: Chinese language po/mo
- Added: Post type list support
- Added: Typenow param for specific metabox options
- Changed: Action from `cs_validate_save` to `cs_validate_save_after` for save after framework options
- Fixed: Color picker appears twice in widgets
- Fixed: Clear button of color-picker in customizer
- Fixed: Fieldset default value option
- Updated: Chosen jquery plugin v1.6.1
- Updated: Google Fonts json for Typography field
- Updated: Font Awesome 4.6.3 icons package
- Improved: Icons select field for avoid conflict
- Improved: Locate path function for windows servers

## 1.0.1
- Added: Taxonomy options framework
- Added: Taxonomy css styles and rtl support
- Added: Framework title option in framework config file
- Added: Show/Hide option for `Reset All Options` button in framework config file
- Added: Helper function for get $_POST/$_GET variables
- Added: Metaboxes array support for post_type. see [#99](https://github.com/Codestar/codestar-framework/issues/99)
- Added: Fieldset new feature `un_array` option for children element getting by unique id. see [#235](https://github.com/Codestar/codestar-framework/issues/235)
- Added: An action `cs_validate_save` for save framework options fields
- Added: Background size option for background field
- Added: Debug light option for showing element id
- Added: Fallback file for avoid missing core functions
- Fixed: Background field custom titles (button, dialog etc) issue
- Updated: Framework documentation for taxonomy framework and fields
- Updated: Font Awesome 4.5.0 icons package
- Changed: Menu type names in framework config file. for eg. from `add_menu_page` to `menu`
- Improved: Theme Check plugin compatibility
- Improved: Dependency script for multiple checkboxes values

## 1.0.0
- Initial Release
