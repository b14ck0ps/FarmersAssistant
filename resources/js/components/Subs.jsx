import React from 'react'
import ReactDOM from 'react-dom/client'
import { useState, useEffect } from 'react'
export default function Subs() {

    const [plans, setPlans] = useState([]);

    useEffect(() => {
        axios.get('/api/subscriptions')
            .then(response => {
                setPlans(response.data.plans);

            })
            .catch(error => {
                console.log(error);
            })
    }, [])



    return (
        <div>
            <div className="flex flex-col items-center justify-center max-h-screen lg:overflow-hidden lg:mt-44">
                <div className="flex items-center justify-center gap-10 mb-10">
                    <div className="flex flex-col items-center justify-center gap-2">
                        <h1 className="text-2xl font-bold">Account</h1>
                    </div>

                    <div>
                        <input type="text" id="pay_method"
                            className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Bank ID" required />
                    </div>

                </div>

                <div className="container w-[1200px] p-5 h-[390px] flex gap-5 flex-wrap justify-center">
                    {plans.map((plan, index) => ( // map through plans
                        <div key={index} className="flex flex-col items-center justify-center gap-2">
                            <div className="p-4 w-[200px] max-w-sm rounded-lg border shadow-md sm:p-8  border-gray-200">
                                <h5 className="mb-4 text-xl font-medium">{plan.planeName}</h5>
                                <div className="flex items-baseline">
                                    <span className="text-3xl font-semibold">৳</span>
                                    <span className="text-5xl font-extrabold tracking-tight">{plan.price}</span>
                                    <span className="ml-1 text-xl font-normal ">/month</span>
                                </div>

                                <ul role="list" className="my-7 space-y-5">
                                    <li className="flex space-x-3">

                                        <svg aria-hidden="true" className="flex-shrink-0 w-5 h-5 text-blue-600" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Check icon</title>
                                            <path fillRule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clipRule="evenodd"></path>
                                        </svg>
                                        <span className="text-base font-normal leading-tight ">{plan.orderDiscount}<span
                                            className="text-sm">%</span>
                                            Discount
                                        </span>
                                    </li>
                                    <li className="flex space-x-3">

                                        <svg aria-hidden="true" className="flex-shrink-0 w-5 h-5 text-blue-500" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Check icon</title>
                                            <path fillRule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clipRule="evenodd"></path>
                                        </svg>
                                        <span className="text-base font-normal leading-tight ">{plan.description}</span>
                                    </li>
                                </ul>

                                <a href={`http://localhost:8000/subscribe/${plan.id}`}
                                    className="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Subscribe</a>

                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    )
}

if (document.getElementById('subs')) {
    ReactDOM.createRoot(document.getElementById("subs")).render(
        <React.StrictMode>
            <Subs />
        </React.StrictMode>
    )
}
