import React from "react";
import PostListItem from "../PostListItem";
import "./post-list.scss";
import {ListGroup} from "reactstrap";
import PropTypes from "prop-types";

const PostList = ({data, onDelete, onToggleImportant, onToggleLiked}) => {

	const postElement = data.map((item) => {
		const {id, ...itemProps} = item;
		return (
			<li key={id} className="list-group-item">
				<PostListItem
					{...itemProps}
					onDelete={() => onDelete(id)}
					onToggleImportant={() => onToggleImportant(id)}
					onToggleLiked={() => onToggleLiked(id)}
				/>
			</li>
		);
	});

	return (
		<ListGroup className="app-list">
			{postElement}
		</ListGroup>
	);
};

PostList.propTypes = {
	data: PropTypes.array,
	onDelete: PropTypes.func,
	onToggleImportant: PropTypes.func,
	onToggleLiked: PropTypes.func,
};

export default PostList;