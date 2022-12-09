import React from 'react'
import ReactDOM from 'react-dom/client'
export default function Nav() {
    return (
        <div>
            <div className="bg-gray-300 shadow shadow-gray-500">
                <div className="flex md justify-between lg:justify-around items-center">
                    <div className="font-Bungee text-xl lg:text-3xl px-4"><a href="/">Farmer's Assistant</a></div>

                    <nav className="flex gap-8 p-3 justify-center">
                        <div><a className="flex items-center gap-2 hover:text-orange-500" href="/signup">
                            Register</a></div>

                        <div className="pr-4"><a className="flex items-center gap-2 hover:text-orange-500" href="/signin">
                            sign in</a></div>

                        <div className="flex items-center gap-2">
                            <a href="/cart" className="flex items-center gap-2 hover:text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                                    stroke="currentColor" className="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                Cart
                            </a>

                            <span className="text-white bg-red-500 rounded-full px-2 py-1 text-xs">

                            </span>

                        </div>

                        <div><a className="flex items-center gap-2 hover:text-orange-500" href="{{ route('farmers.editProfile') }}">
                            Setting</a></div>

                        <div><a className="flex items-center gap-2 hover:text-orange-500" href="{{ route('farmers.dashboard') }}">
                            Profile</a></div>

                        <div><a className="flex items-center gap-2 hover:text-orange-500" href="{{ route('mail') }}">
                            Mail</a></div>


                        <div className="pr-4"><a className="flex items-center gap-2 hover:text-orange-500" href="/logout">
                            Log out</a></div>
                    </nav>
                </div>
            </div>
        </div>
    )
}

if (document.getElementById('nav')) {
    ReactDOM.createRoot(document.getElementById("nav")).render(
        <React.StrictMode>
            <Nav />
        </React.StrictMode>
    )
}
