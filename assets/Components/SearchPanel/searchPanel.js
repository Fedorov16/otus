import React from "react";
import "./search-panel.scss";
import PropTypes from "prop-types";

const  SearchPanel = ({onSearchPosts}) => {

	const handleSearch = (e) => {
		onSearchPosts(e.target.value);
	};

	return (
		<input
			className="search-input form-control"
			type="text"
			placeholder="поиск по записям"
			onChange={handleSearch}
		/>
	);
};

SearchPanel.propTypes = {
	onSearchPosts: PropTypes.func
};

export default SearchPanel;