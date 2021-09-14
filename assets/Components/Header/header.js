import React from "react";
import "./app-header.scss";
import PropTypes from "prop-types";

const Header = ({all, liked}) => {
	return (
		<div className="app-header d-flex">
			<h1>Sergey Fedorov</h1>
			<h2>{all} из них понравилось {liked}</h2>
		</div>
	);
};

Header.propTypes = {
	all: PropTypes.number,
	liked: PropTypes.number,
};

export default Header;