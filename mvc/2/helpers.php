<?php

/**
 * Render header.
 *
 * @param array $data
 */
function renderHeader($data = [])
{
	extract($data);
	require('header.php');
}

/**
 * Render footer.
 *
 * @param array $data
 */
function renderFooter($data = [])
{
	extract($data);
	require('footer.php');
}
