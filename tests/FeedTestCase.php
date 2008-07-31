<?php

require_once 'TestCase.php';

class FeedTestCase extends TestCase
{
	// {{{ protected properties

	/**
	 * @var DOMXPath
	 */
	protected $xpath;

	/**
	 * @var DOMDocument
	 */
	protected $document;

	// }}}
	// {{{ protected function loadFeed()

	protected function loadFeed($uri)
	{
		$curl = curl_init($uri);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$feed = curl_exec($curl);
		curl_close($curl);

		$this->document = new DOMDocument();
		$this->document->resolveExternals = true;
		$this->document->loadXml($feed);

		$this->xpath = new DOMXPath($this->document);
		$this->xpath->registerNamespace('atom', 'http://www.w3.org/2005/Atom');
		$this->xpath->registerNamespace('html','http://www.w3.org/1999/xhtml');
	}

	// }}}
}

?>