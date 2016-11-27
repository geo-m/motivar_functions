<?php
    //API Key - see http://admin.mailchimp.com/account/api

    $apikey = get_option('motivar_functions_mcp_key');

    // A List Id to run examples against. use lists() to view all
    // Also, login to MC account, go to List, then List Tools, and look for the List ID entry
    $listId = get_option('motivar_functions_mcp_list_id');


    //just used in xml-rpc examples
    $apiUrl = 'http://api.mailchimp.com/1.3/';

?>