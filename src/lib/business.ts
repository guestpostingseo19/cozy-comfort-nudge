export const business = {
  name: "The Oven Pizza Chichawatni",
  shortName: "The Oven Pizza",
  tagline: "Fresh from the fire. Straight to your table.",
  rating: 4.8,
  reviews: 140,
  address: "Kamboh Road, Street No. 12, Block 12, Chichawatni, Punjab, Pakistan",
  addressShort: "Kamboh Road, Block 12, Chichawatni",
  plusCode: "GMGR+R5 Chichawatni",
  phone: "+92 300 1580250",
  phoneRaw: "+923001580250",
  whatsapp: "923001580250",
  hours: "Open Daily · 11:00 AM – 2:00 AM",
  priceRange: "Rs 1 – 1000",
  mapEmbed:
    "https://www.google.com/maps?q=Chichawatni,+Punjab,+Pakistan&output=embed",
  mapLink: "https://maps.google.com/?q=The+Oven+Pizza+Chichawatni",
  social: {
    facebook: "https://facebook.com/theovenpizzachichawatni",
    instagram: "https://instagram.com/theovenpizzachichawatni",
    tiktok: "https://tiktok.com/@theovenpizzamianchannu",
  },
};

export const waLink = (msg = "Hi! I'd like to place an order.") =>
  `https://wa.me/${business.whatsapp}?text=${encodeURIComponent(msg)}`;

export const telLink = `tel:${business.phoneRaw}`;
