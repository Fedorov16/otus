import React from "react";
import Header from "../Header";
import SearchPanel from "../SearchPanel";
import PostStatusFilter from "../PostStatusFilter";
import PostList from "../PostList";
import PostAddForm from "../PostAddForm";
import "./app.scss";

const App = () => {
	const data = [
		{id: 1, label: "going to learn React", important: true, liked: true},
		{id: 2, label: "This is so good", important: true},
		{id: 3, label: "I need a break...", important: false, liked: true},
	];
	
	return (
		<div className="app">
			<Header/>
			<div className="search-panel d-flex">
				<SearchPanel/>
				<PostStatusFilter/>
			</div>
			<PostList data={data}/>
			<PostAddForm/>
		</div>
	);
};

export default App;
