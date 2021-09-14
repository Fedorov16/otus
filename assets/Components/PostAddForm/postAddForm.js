import React, {useState} from "react";
import "./post-add-form.scss";
import PropTypes from "prop-types";

const PostAddForm = ({onSubmit}) => {
	const [itemMessage, setItemMessage] = useState();

	return(
		<div className="bottom-panel d-flex">
			<input
				type="text"
				placeholder="What are you thinking about"
				className="form-control new-post-label"
				onChange={setItemMessage}
			/>
			<button type="submit" className="btn-outline-secondary" onClick={() => onSubmit(itemMessage)}>
                Add post
			</button>
		</div>
	);
};

PostAddForm.propTypes = {
	onSubmit: PropTypes.func
};

export default PostAddForm;