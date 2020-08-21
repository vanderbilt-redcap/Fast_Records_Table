# Fast Records Table (REDCap External Module)

This module adds a 'Fast Records Table' page to a REDCap project. Visiting this page shows a table where records are rows and columns are field values and links to the record's forms.

![Default table configuation](/_readme_images/default_table.PNG)

The module always has at least one column, the data column for the project's record ID field. The module can be configured to show any number of additional field columns by adding fields via the External Modules -> 'Configure' modal.

![Settings](/_readme_images/settings.PNG)

By default, the module's table will have a column for each project form. The module can be configured to show form columns for only specified forms by adding forms to the project settings via the External Modules -> 'Configure' modal.

Users can search the table by entering a value in the 'Search' bar to filter table results dynamically.

![Configured table](/_readme_images/configured_table.PNG)

Author:
Carl Reed, Vanderbilt University Medical Center, TN
carl.w.reed@vumc.org