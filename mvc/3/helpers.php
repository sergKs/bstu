<?php

/**
 * Render template.
 *
 * @param string $template
 * @param array $data
 */
function render($template, $data = [])
{
	$path = $template . '.php';

	if (file_exists($path)) {
		extract($data);
		require($path);
	}
}
