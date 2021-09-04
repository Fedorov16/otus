import React from "react";
import "./post-add-form.scss";

const PostAddForm = () => {
	return(
		<form className="bottom-panel d-flex">
			<input
				type="text"
				placeholder="What are you thinking about"
				className="form-control new-post-label"
			/>
			<button type="submit" className="btn-outline-secondary">
                Add post
			</button>
		</form>
	);
};

export default PostAddForm;