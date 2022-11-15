<?php
$payload='{"input":"let\na=1\nin\nb=a^2"}';
if (php_sapi_name() != "cli") {
  $payload=file_get_contents('php://input');
}

$data = json_decode($payload);
$input=$data->{'input'};

$cmd = "/usr/bin/java";
$parts = array(
	'-jar' => 'PhyCC.jar'
);

$args = '';
foreach ($parts as $k => $part) {
	if (is_string($k)) {
		$args .= ' ' . escapeshellarg($k) . ' ' . escapeshellarg($part);
	} else {
		$args .= ' ' . escapeshellarg($part);
	}
}

$process_cmd = '"' . $cmd . '"' . ' ' . $args;

$env = NULL;
$options = array('bypass_shell' => true);
$cwd = NULL;
$descriptorspec = array(
   0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
   1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
   2 => array("pipe", "w")  // stderr is a file to write to
);

#$input="let\na=1\nin\nb=a\n";

$process = proc_open($process_cmd, $descriptorspec, $pipes, $cwd, $env, $options);

if (is_resource($process)) {
	#echo $input;
	fwrite($pipes[0], $input);
	fclose($pipes[0]);

	echo stream_get_contents($pipes[1]);
	fclose($pipes[1]);

	$return_value = proc_close($process);
}

?>

