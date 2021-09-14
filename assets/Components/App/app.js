import React, {useState} from "react";
import Header from "../Header";
import SearchPanel from "../SearchPanel";
import PostStatusFilter from "../PostStatusFilter";
import PostList from "../PostList";
import PostAddForm from "../PostAddForm";
import "./app.scss";

const App = () => {
	const dataFromB = [
		{id: 1, label: "going to learn React", important: true, liked: false},
		{id: 2, label: "This is so good", important: true, liked: true},
		{id: 3, label: "I need a break...", important: false, liked: false},
	];
	const [data, setData] = useState(dataFromB);
	const [id, setId] = useState(data.length+1);
	const [pattern, setPattern] = useState("");
	const [select, setSelect] = useState("All");

	const handleOnDelete = (id) => {
		const index = data.findIndex(elem => elem.id === id);
		const before = data.slice(0, index);
		const after = data.slice(index+1);
		setData([...before, ...after]);
	};

	const handleOnSubmit = (label) => {
		if(!label) {
			return;
		}
		const itemNew = {
			id: id,
			label: label,
			important: false,
			liked: false,
		};
		setId(id+1);
		setData([...data, itemNew]);
	};

	const onToggleImportant = (id) => {
		const newData = toggleItem(id, "important");
		setData(newData);
	};

	const onToggleLiked = (id) => {
		const newData = toggleItem(id, "liked");
		setData(newData);
	};

	const toggleItem = (id, metric) => {
		const index = data.findIndex(elem => elem.id === id);
		const dataItem = data[index];
		const itemEdit = {...dataItem, [metric]: !dataItem[metric]};
		const before = data.slice(0, index);
		const after = data.slice(index+1);
		return [...before, itemEdit, ...after];
	};

	const onSearchPosts = (pattern) => {
		setPattern(pattern);
	};

	const onFilter = (select) => {
		setSelect(select);
	};

	const filterPost = (items, select) => {
		if (select === "Liked") {
			return items.filter(item => item.liked);
		}
		return items;
	};

	const filterData = filterPost(data.filter(item => item.label.indexOf(pattern) > -1), select);

	return (
		<div className="app">
			<Header
				all={data.length}
				liked={data.filter(item => item.liked).length}
			/>
			<div className="search-panel d-flex">
				<SearchPanel
					onSearchPosts={onSearchPosts}
				/>
				<PostStatusFilter
					select={select}
					onFilter={onFilter}
				/>
			</div>
			<PostList
				data={filterData}
				onDelete={handleOnDelete}
				onToggleImportant={onToggleImportant}
				onToggleLiked={onToggleLiked}
			/>
			<PostAddForm
				onSubmit={handleOnSubmit}
			/>
		</div>
	);
};

export default App;
