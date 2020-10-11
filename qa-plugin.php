<?php


/*
Question List Details Plugin  by teddyoors
*/


if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}



qa_register_plugin_layer('question-list-layer.php', 'Question List Layer');

