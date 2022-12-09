import React from 'react';
import ReactDOM from 'react-dom/client';

export default function Home() {

    const [products, setProducts] = React.useState([]);

    React.useEffect(() => {
        axios.get('/api/allProducts')
            .then(response => {
                setProducts(response.data);
            })
            .catch(error => {
                console.log(error);
            })
    }, [])

    //search
    const [search, setSearch] = React.useState('');

    const handleSearch = (e) => {
        e.preventDefault();
        axios.post('/api/searchProducts', { search })
            .then(response => {
                setProducts(response.data);
            })
            .catch(error => {
                console.log(error);
            })
    }



    return (
        <div>
            <div className="mx-52 mt-10">
                <form>
                    <div className="relative">
                        <div className="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" className="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path strokeLinecap="round" strokeWidth="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="search" name="search"
                            onChange={(e) => setSearch(e.target.value)}
                            className="block p-4 pl-10 w-full text-sm text-gray-800 bg-gray-50 rounded-lg border border-gray-300 "
                            placeholder="Search products" required="" />
                        <button type="submit"
                            className="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 "
                            onClick={handleSearch}
                        >Search</button>
                    </div>
                </form>
            </div>


            <div className="flex flex-wrap mx-10 items-center justify-center">
                {products.map(product => (
                    <div key={product.id} className="w-60 max-w-sm rounded-lg shadow-md  border-gray-700 m-10" id="{{ $product->id }}">
                        <a href="#">
                            <img className="p-8 rounded-t-lg h-56" src={`http://localhost:8000/uploads/product/${product.image}`}
                                alt="product image" />
                        </a>
                        <div className="px-3 pb-5">
                            <div className="flex justify-between">
                                <a href="#">
                                    <h5 className="font-bold tracking-tight truncate">{product.title}</h5>
                                </a>
                                <p className="text-xs">{product.quantity}</p>
                            </div>
                            <div className="my-2 truncate">
                                <p>{product.description}</p>
                            </div>
                            <div className="flex justify-between items-center">
                                <span className="text-2xl font-bold  ">৳ {product.price}</span>
                                <a href={`http://localhost:8000/cart/${product.id}`}
                                    className=" text-white focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-3 py-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Add
                                    to cart</a>
                            </div>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    )
}


if (document.getElementById('home')) {
    const Index = ReactDOM.createRoot(document.getElementById("home"));

    Index.render(
        <React.StrictMode>
            <Home />
        </React.StrictMode>
    )
}
