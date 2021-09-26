import React from "react";
import "./post-status-filter.scss";
import {Button} from "reactstrap";
import PropTypes from "prop-types";

const PostStatusFilter = ({select, onFilter}) => {
	const btns = [
		{name: "All", label: "All"},
		{name: "Liked", label: "Liked"}
	];

	const buttons = btns.map(({name, label}) => {
		const color = select === name ? "info" : "";
		return (
			<Button
				onClick={() => onFilter(name)}
				key={name}
				color={color}
			>
				{label}
			</Button>
		);
	});

	return(
		<div className="btn-group">
			{buttons}
		</div>
	);
};

PostStatusFilter.propTypes = {
	select: PropTypes.string,
	onFilter: PropTypes.func,
};

export default PostStatusFilter;