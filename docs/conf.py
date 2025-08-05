import sphinx_rtd_theme

project = 'ShareIt Docs'
author = 'Windra'
release = '1.0'

extensions = ['sphinx_rtd_theme']
templates_path = ['_templates']
exclude_patterns = []

html_theme = 'sphinx_rtd_theme'
html_theme_path = [sphinx_rtd_theme.get_html_theme_path()]
html_static_path = ['_static']
