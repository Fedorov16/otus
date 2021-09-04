import React from "react";
import PostListItem from "../PostListItem";
import "./post-list.scss";

const PostList = () => {
	return (
		<ul className="app-list list-group">
			<PostListItem/>
			<PostListItem/>
			<PostListItem/>
		</ul>
	);
};

export default PostList;