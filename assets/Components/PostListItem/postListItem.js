import React from "react";
import "./post-list-item.scss";
import PropTypes from "prop-types";

const PostListItem = ({label, important= false, liked = false, onDelete, onToggleImportant, onToggleLiked}) => {

	let importantClasses= "btn-star btn-sm default";
	let likedClasses= "btn-star btn-sm default";
	if (important) {
		importantClasses = "btn-star btn-sm isImportant";
	}
	if (liked) {
		likedClasses = "btn-sm isLiked";
	}

	return(
		<div className='app-list-item d-flex justify-content-between'>
			<span className="app-list-item-label">
				{label}
			</span>
			<div className="d-flex justify-content-center align-items-center">
				<button type="button" className={importantClasses} onClick={onToggleImportant}>
					<i className="fa fa-star"/>
				</button>
				<button type="button" className="btn-trash btn-sm" onClick={onDelete}>
					<i className="fa fa-trash"/>
				</button>
				<button type="button" className={likedClasses} onClick={onToggleLiked}>
					<i className="fa fa-bullhorn"/>
				</button>
			</div>
		</div>
	);
};

PostListItem.propTypes = {
	label: PropTypes.string,
	important: PropTypes.bool,
	liked: PropTypes.bool,
	onDelete: PropTypes.func,
	onToggleImportant: PropTypes.func,
	onToggleLiked: PropTypes.func,
};

export default PostListItem;