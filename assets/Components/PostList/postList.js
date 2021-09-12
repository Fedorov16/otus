import React from "react";
import PostListItem from "../PostListItem";
import "./post-list.scss";

const PostList = ({data}) => {

	const postElement = data.map((item) => {
		const {id, ...itemProps} = item;
		return (
			<li key={id} className="list-group-item">
				<PostListItem {...itemProps}/>
			</li>
		);
	});

	return (
		<ul className="app-list list-group">
			{postElement}
		</ul>
	);
};

export default PostList;