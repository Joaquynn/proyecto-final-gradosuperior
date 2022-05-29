import React from 'react';

function Signal(props) {
	const title = props.title || "signal";

	return (
		<svg height="64" width="64" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
	<title>{title}</title>
	<g fill="#000000">
		<path d="M32 22.9c-2.9 0-5.3 2.4-5.3 5.3 0 2.3 1.5 4.3 3.6 5v19.9c0 1 .8 1.8 1.8 1.8s1.8-.8 1.8-1.8V33.2c2.1-.7 3.6-2.7 3.6-5-.2-2.9-2.6-5.3-5.5-5.3zm0 7.1c-1 0-1.8-.8-1.8-1.8s.8-1.8 1.8-1.8 1.8.8 1.8 1.8S33 30 32 30z"/>
		<path d="M23.9 19.6c-.7-.7-1.8-.7-2.5 0-2.1 2.1-3.3 4.9-3.3 7.8 0 3 1.2 5.8 3.3 8 .3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5.7-.7.7-1.8 0-2.5-1.5-1.5-2.3-3.4-2.3-5.5 0-2 .8-3.9 2.3-5.4.8-.6.8-1.7.1-2.4z"/>
		<path d="M40.1 19.6c-.7.7-.7 1.8 0 2.5 1.4 1.4 2.2 3.3 2.3 5.4 0 2.1-.8 4-2.3 5.5-.7.7-.7 1.8 0 2.5.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5 2.1-2.1 3.3-5 3.3-8s-1.2-5.8-3.3-7.8c-.6-.8-1.7-.7-2.4-.1z"/>
		<path d="M17.6 14.7c-.7-.7-1.8-.7-2.5 0-3.5 3.4-5.4 8-5.4 12.9s1.9 9.4 5.4 12.9c.3.3.8.5 1.2.5.5 0 .9-.2 1.2-.5.7-.7.7-1.8 0-2.5a14.6 14.6 0 0 1-4.3-10.4c0-3.9 1.5-7.6 4.3-10.4.7-.8.7-1.9.1-2.5z"/>
		<path d="M48.9 14.6c-.7-.7-1.8-.7-2.5 0s-.7 1.8 0 2.5c2.8 2.8 4.3 6.5 4.3 10.4 0 3.9-1.5 7.6-4.3 10.4-.7.7-.7 1.8 0 2.5.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5 3.5-3.4 5.4-8 5.4-12.9s-1.8-9.4-5.3-12.9z"/>
		<path d="M4.8 27.5c0-5.8 2.3-11.3 6.4-15.4.7-.7.7-1.8 0-2.5-.7-.6-1.8-.6-2.5.1-4.8 4.8-7.5 11.1-7.5 17.8 0 6.7 2.7 13.1 7.5 17.8.3.3.8.5 1.2.5.5 0 .9-.2 1.2-.5.7-.7.7-1.8 0-2.5-4.1-4-6.3-9.5-6.3-15.3z"/>
		<path d="M55.3 9.7c-.7-.7-1.8-.7-2.5 0s-.7 1.8 0 2.5c4.1 4.1 6.4 9.6 6.4 15.4 0 5.8-2.3 11.3-6.4 15.4-.7.7-.7 1.8 0 2.5.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5 4.8-4.8 7.5-11.1 7.5-17.8.1-6.9-2.6-13.3-7.4-18z"/>
	</g>
</svg>
	);
};

export default Signal;