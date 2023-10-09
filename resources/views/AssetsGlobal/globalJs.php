<?php
echo
        HtmlHelper::htmlResources([
                        //HtmlHelper::mix_version('/assets/js/scripts.js'),
                ('https://cdn.jsdelivr.net/npm/sweetalert2@11'),
                HtmlHelper::mix_version('https://kit.fontawesome.com/a076d05399.js'),
        ], 'javascript');