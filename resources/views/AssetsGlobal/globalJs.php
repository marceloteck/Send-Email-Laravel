<?php
echo
        HtmlHelper::htmlResources([
                        //HtmlHelper::mix_version('/assets/js/scripts.js'),
                ('https://cdn.jsdelivr.net/npm/sweetalert2@11'),
        ], 'javascript');