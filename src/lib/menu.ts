import pizza1 from "@/assets/pizza-1.jpg";
import pizza2 from "@/assets/pizza-2.jpg";
import pizza3 from "@/assets/pizza-3.jpg";
import wings from "@/assets/wings.jpg";
import burger from "@/assets/burger.jpg";
import shawarma from "@/assets/shawarma.jpg";
import sandwich from "@/assets/sandwich.jpg";
import fries from "@/assets/fries.jpg";

export type MenuItem = {
  name: string;
  desc: string;
  price: string;
  img: string;
  spice?: 1 | 2 | 3;
  popular?: boolean;
  category: string;
};

export const categories = [
  "Signature Pizza",
  "Stuffed Crust",
  "Classic Pizza",
  "Sandwiches",
  "Burgers",
  "Chicken",
  "Sides",
  "Drinks",
] as const;

export const menu: MenuItem[] = [
  {
    category: "Signature Pizza",
    name: "The Oven Special",
    desc: "Our house special — chicken, olives, mushrooms, bell peppers, creamy garlic sauce, mozzarella.",
    price: "Rs 1550 – 2150",
    img: pizza2,
    popular: true,
    spice: 2,
  },
  {
    category: "Signature Pizza",
    name: "Arabic Bite",
    desc: "Spiced chicken, onions, jalapeños, cheddar & mozzarella on a golden crust.",
    price: "Rs 1300 – 1800",
    img: pizza3,
    popular: true,
    spice: 3,
  },
  {
    category: "Signature Pizza",
    name: "Creamy Chicken Pizza",
    desc: "Grilled chicken bathed in creamy white sauce with olives and herbs.",
    price: "Rs 1400 – 1950",
    img: pizza2,
    spice: 1,
  },
  {
    category: "Stuffed Crust",
    name: "Crown Crust Supreme",
    desc: "A crown of cheese-stuffed edges around a fully-loaded chicken tikka centre.",
    price: "Rs 1650 – 2250",
    img: pizza3,
    popular: true,
    spice: 2,
  },
  {
    category: "Stuffed Crust",
    name: "Extreme Cheese Crust",
    desc: "Extra mozzarella baked into every bite of the crust. Cheese lovers only.",
    price: "Rs 1550 – 2100",
    img: pizza1,
    spice: 1,
  },
  {
    category: "Classic Pizza",
    name: "Chicken Tikka",
    desc: "Marinated tikka chicken, onions, capsicum, tikka sauce, mozzarella.",
    price: "Rs 900 – 1600",
    img: pizza3,
    spice: 3,
  },
  {
    category: "Classic Pizza",
    name: "Chicken Fajita",
    desc: "Fajita chicken with bell peppers, onions and a smoky tomato base.",
    price: "Rs 900 – 1600",
    img: pizza1,
    spice: 2,
  },
  {
    category: "Classic Pizza",
    name: "Pepperoni Classic",
    desc: "Rich tomato base, thick pepperoni, molten mozzarella. A timeless favourite.",
    price: "Rs 950 – 1650",
    img: pizza1,
    spice: 2,
  },
  {
    category: "Sandwiches",
    name: "Pan Sandwich",
    desc: "Grilled pan bread stuffed with cheesy chicken, served with crispy fries.",
    price: "Rs 550",
    img: sandwich,
    popular: true,
  },
  {
    category: "Burgers",
    name: "Zinger Burger",
    desc: "Crispy zinger fillet, lettuce, mayo, cheese in a soft sesame bun.",
    price: "Rs 600",
    img: burger,
    popular: true,
    spice: 2,
  },
  {
    category: "Burgers",
    name: "Reggy Burger",
    desc: "Signature reggy chicken patty with fresh veggies and house sauce.",
    price: "Rs 600",
    img: burger,
  },
  {
    category: "Chicken",
    name: "Chicken Wings",
    desc: "Golden roasted wings glazed with sesame and a squeeze of lemon.",
    price: "Rs 700",
    img: wings,
    popular: true,
    spice: 3,
  },
  {
    category: "Chicken",
    name: "Chicken Shawarma (x2)",
    desc: "Two loaded chicken shawarma rolls with garlic sauce and fresh veg.",
    price: "Rs 400",
    img: shawarma,
    popular: true,
  },
  {
    category: "Sides",
    name: "Golden Fries",
    desc: "Crispy hand-cut fries with our signature dip.",
    price: "Rs 250",
    img: fries,
  },
  {
    category: "Drinks",
    name: "Chilled Soft Drinks",
    desc: "Coke, Sprite, Fanta and more. Served ice-cold.",
    price: "Rs 80 – 200",
    img: fries,
  },
];

export const deals = [
  {
    title: "Small Pizza · Tikka / Fajita",
    price: "Rs 500",
    tag: "Deal 1",
    perks: ["Small Pizza", "Fresh from the oven", "Best for solo lunch"],
    highlight: false,
  },
  {
    title: "Medium Pizza · Tikka / Fajita",
    price: "Rs 800",
    tag: "Deal 2",
    perks: ["Medium Pizza", "Serves 2 easily", "Loaded toppings"],
    highlight: true,
  },
  {
    title: "Pan Sandwich Combo",
    price: "Rs 550",
    tag: "Deal 3",
    perks: ["Grilled Pan Sandwich", "Crispy Fries", "Chilled Drink option"],
    highlight: false,
  },
  {
    title: "Zinger / Reggy Burger",
    price: "Rs 600",
    tag: "Deal 4",
    perks: ["Signature Burger", "Fries add-on ready", "Fast service"],
    highlight: false,
  },
  {
    title: "2 Chicken Shawarma",
    price: "Rs 400",
    tag: "Deal 5",
    perks: ["Two full rolls", "Loaded chicken", "Garlic sauce"],
    highlight: true,
  },
];
