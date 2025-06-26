const plugin = require("tailwindcss/plugin");

module.exports = {
  content: [
    "./*.php",
    "./assets/js/*.js",
    "./inc/**/*.php",
    "./template-parts/**/*.php",
    "./templates/**/*.php",
    "./safelist.txt",
  ],
  safelist: [
    "text-center",
    "animate-slide-in-top",
    "animate-slide-out-top",
    "visible",
    "invisible",
    "opacity-0",
    "opacity-100",
    "duration-1000",
    "pointer-events-none",
  ],
  theme: {
    container: {
      center: true,
      screens: {
        xl: "1280px",
      },
      padding: {
        DEFAULT: "4.2%",
        md: "2.5rem",
      },
    },
    extend: {
      backgroundImage: ({ theme }) => ({
        "custom-gradient":
          "linear-gradient(123.73deg, #3533CD 0%, #16A3DF 100.76%)",
      }),
      fontSize: {
        base: ["1rem"],
      },
      fontFamily: {
        "base-family": "var(--base-font-family)",
        "en-family": "var(--en-font-family)",
        "num-family": "var(--num-font-family)",
      },
      colors: {
        primary: withOpacityValue("--primary-color-rgb"),
        secondary: "var(--secondary-color)",
        accent: "var(--accent-color)",
        "base-font-color": "var(--contrast-color)",
      },
      borderColor: {},
      transitionProperty: {
        "opacity-bg-color": "opacity, background-color",
      },
      typography: {
        DEFAULT: {
          css: {
            color: "inherit",
            maxWidth: "none",
            lineHeight: "inherit",
            fontSize: "var(--base-font-size)",
            p: {},
            '[class~="lead"]': {
              color: "inherit",
            },
            a: {
              color: "var(--link-font-color)",
              textDecoration: "underline",
              fontWeight: "400",
              "&:hover": {
                textDecoration: "none", // ホバー時に下線を消す
              },
            },
            strong: {
              color: "inherit",
              fontWeight: "700",
            },
            "a strong": {
              color: "inherit",
            },
            "blockquote strong": {
              color: "inherit",
            },
            "thead th strong": {
              color: "inherit",
            },
            ol: {
              listStyleType: "decimal",
            },
            'ol[type="A"]': {
              listStyleType: "upper-alpha",
            },
            'ol[type="a"]': {
              listStyleType: "lower-alpha",
            },
            'ol[type="A" s]': {
              listStyleType: "upper-alpha",
            },
            'ol[type="a" s]': {
              listStyleType: "lower-alpha",
            },
            'ol[type="I"]': {
              listStyleType: "upper-roman",
            },
            'ol[type="i"]': {
              listStyleType: "lower-roman",
            },
            'ol[type="I" s]': {
              listStyleType: "upper-roman",
            },
            'ol[type="i" s]': {
              listStyleType: "lower-roman",
            },
            'ol[type="1"]': {
              listStyleType: "decimal",
            },
            ul: {
              listStyleType: "disc",
            },
            "ol > li::marker": {
              fontWeight: "inherit",
              color: "inherit",
            },
            "ul > li::marker": {
              color: "inherit",
            },
            dt: {
              color: "inherit",
              fontWeight: "700",
            },
            hr: {
              borderColor: "inherit",
              borderTopWidth: 1,
            },
            blockquote: {
              fontWeight: "inherit",
              fontStyle: "inherit",
              color: "inherit",
              borderInlineStartWidth: "0.25rem",
              borderInlineStartColor: "inherit",
              quotes: '"\\201C""\\201D""\\2018""\\2019"',
            },
            "blockquote p:first-of-type::before": {
              content: "open-quote",
            },
            "blockquote p:last-of-type::after": {
              content: "close-quote",
            },
            "h1,h2,h3,h4,h5,h6": {
              marginTop: "3rem",
              marginBottom: "1.5rem",
            },
            "> :first-child": {
              marginTop: "0 !important",
            },
            p: {
              marginBottom: "1.5rem",
            },
            h1: {
              color: "inherit",
              fontWeight: "700",
            },
            h2: {
              color: "inherit",
              fontWeight: "700",
              fontSize: "20px",
              letterSpacing: "0.05em",
              borderBottom: "none",
              lineHeight: "inherit",
              borderImage:
                "linear-gradient(90deg, var(--blue-bg-gradient-color01), var(--blue-bg-gradient-color02)) 1",
              borderBottom: "4px solid var(--base-border-color)",
              padding: "1rem 0",
              "@screen md": {
                padding: "1.5rem 0",
                fontSize: "1.5rem",
              },
            },
            h3: {
              color: "inherit",
              fontWeight: "700",
              fontSize: "18px",
              letterSpacing: "0.03em",
              lineHeight: "inherit",
              backgroundColor: "var(--prose-h3-bg-color)",
              padding: "1rem",
              "@screen md": {
                fontSize: "22px",
              },
            },
            h4: {
              color: "inherit",
              fontWeight: "700",
              fontSize: "16px",
              letterSpacing: "0.03em",
              lineHeight: "inherit",
              padding: "0.5rem 1rem",
              borderLeft: "2px solid var(--primary-color)",
              "@screen md": {
                fontSize: "20px",
              },
            },
            h5: {
              fontSize: "16px",
              letterSpacing: "0.03em",
              fontWeight: "700",
              lineHeight: "inherit",
              padding: "1rem 0.5rem",
              borderBottom: "1px solid var(--base-border-color)",
              "@screen md": {
                fontSize: "18px",
              },
            },
            "h1 strong": {
              fontWeight: "900",
              color: "inherit",
            },
            "h2 strong": {
              fontWeight: "700",
              color: "inherit",
            },
            "h3 strong": {
              fontWeight: "700",
              color: "inherit",
            },
            "h4 strong": {
              fontWeight: "700",
              color: "inherit",
            },
            img: {}, // Required to maintain correct order when merging
            picture: {
              display: "block",
            },
            video: {}, // Required to maintain correct order when merging
            kbd: {
              fontWeight: "500",
              fontFamily: "inherit",
              color: "inherit",
              boxShadow:
                "0 0 0 1px rgb(var(--tw-prose-kbd-shadows) / 10%), 0 3px 0 rgb(var(--tw-prose-kbd-shadows) / 10%)",
            },
            code: {
              color: "var(--tw-prose-code)",
              fontWeight: "600",
            },
            "code::before": {
              content: '"`"',
            },
            "code::after": {
              content: '"`"',
            },
            "a code": {
              color: "inherit",
            },
            "h1 code": {
              color: "inherit",
            },
            "h2 code": {
              color: "inherit",
            },
            "h3 code": {
              color: "inherit",
            },
            "h4 code": {
              color: "inherit",
            },
            "blockquote code": {
              color: "inherit",
            },
            "thead th code": {
              color: "inherit",
            },
            pre: {
              color: "var(--tw-prose-pre-code)",
              backgroundColor: "var(--tw-prose-pre-bg)",
              overflowX: "auto",
              fontWeight: "400",
            },
            "pre code": {
              backgroundColor: "transparent",
              borderWidth: "0",
              borderRadius: "0",
              padding: "0",
              fontWeight: "inherit",
              color: "inherit",
              fontSize: "inherit",
              fontFamily: "inherit",
              lineHeight: "inherit",
            },
            "pre code::before": {
              content: "none",
            },
            "pre code::after": {
              content: "none",
            },
            table: {
              width: "100%",
              tableLayout: "auto",
              borderTop: "1px solid var(--base-border-color)",
              borderBottom: "1px solid var(--base-border-color)",
            },
            thead: {
              border: "none!important",
            },
            "thead th": {
              color: "inherit",
              fontWeight: "700",
              verticalAlign: "bottom",
              border: "none",
            },
            "tbody tr,thead tr": {
              borderBottomWidth: "1px",
            },
            "tbody tr:last-child": {
              borderBottomWidth: "0",
            },
            "tbody td": {
              verticalAlign: "baseline",
            },
            tfoot: {
              borderTopWidth: "1px",
              borderTopColor: "inherit",
            },
            "tfoot td": {
              verticalAlign: "top",
            },
            "th, td": {
              textAlign: "start",
            },
            "figure > *": {}, // Required to maintain correct order when merging
            figcaption: {
              color: "var(--tw-prose-captions)",
            },
            "tbody td, tfoot td,tbody th, tfoot th,thead td,thead th": {
              padding: "0.5rem",
              "@screen md": {
                padding: "1rem",
              },
            },
            li: {
              marginBottom: "1.5rem",
            },
          },
        },
        "page": {
          css: {
            h2: {
              color: "inherit",
              fontWeight: "700",
              fontSize: "22px",
              letterSpacing: "0.05em",
              borderBottom: "none",
              lineHeight: "inherit",
              borderImage:
                "linear-gradient(180deg, var(--blue-bg-gradient-color01), var(--blue-bg-gradient-color02)) 1",
              borderLeft: "4px solid var(--base-border-color)",
              padding: "0.5rem 1rem",
              "@screen md": {
                padding: "1.5rem",
                fontSize: "27px",
              },
            },
            h3: {
              color: "var(--primary-color)",
              fontWeight: "700",
              fontSize: "20px",
              letterSpacing: "0.03em",
              lineHeight: "inherit",
              padding: "0",
              backgroundColor: "transparent",
              "@screen md": {
                fontSize: "25px",
              },
            },
          },
        },
      },
    },
  },
  plugins: [
    require("@tailwindcss/typography"),
    plugin(function ({ addComponents, theme }) {
      addComponents({
        ".container1440": {
          maxWidth: "1520px",
          marginLeft: "auto",
          marginRight: "auto",
          paddingLeft: theme("container.padding.DEFAULT"),
          paddingRight: theme("container.padding.DEFAULT"),
          "@screen md": {
            paddingLeft: theme("container.padding.md"),
            paddingRight: theme("container.padding.md"),
          },
        },
        ".container1280": {
          maxWidth: "1360px",
          marginLeft: "auto",
          marginRight: "auto",
          paddingLeft: theme("container.padding.DEFAULT"),
          paddingRight: theme("container.padding.DEFAULT"),
          "@screen md": {
            paddingLeft: theme("container.padding.md"),
            paddingRight: theme("container.padding.md"),
          },
        },
        ".container": {
          maxWidth: "1280px",
          marginLeft: "auto",
          marginRight: "auto",
          paddingLeft: theme("container.padding.DEFAULT"),
          paddingRight: theme("container.padding.DEFAULT"),
          "@screen md": {
            paddingLeft: theme("container.padding.md"),
            paddingRight: theme("container.padding.md"),
          },
        },
        ".container1080": {
          maxWidth: "1160px",
          marginLeft: "auto",
          marginRight: "auto",
          paddingLeft: theme("container.padding.DEFAULT"),
          paddingRight: theme("container.padding.DEFAULT"),
          "@screen md": {
            paddingLeft: theme("container.padding.md"),
            paddingRight: theme("container.padding.md"),
          },
        },
        ".container1024": {
          maxWidth: "1084px",
          marginLeft: "auto",
          marginRight: "auto",
          paddingLeft: theme("container.padding.DEFAULT"),
          paddingRight: theme("container.padding.DEFAULT"),
          "@screen md": {
            paddingLeft: theme("container.padding.md"),
            paddingRight: theme("container.padding.md"),
          },
        },
        ".container960": {
          maxWidth: "1040px",
          marginLeft: "auto",
          marginRight: "auto",
          paddingLeft: theme("container.padding.DEFAULT"),
          paddingRight: theme("container.padding.DEFAULT"),
          "@screen md": {
            paddingLeft: theme("container.padding.md"),
            paddingRight: theme("container.padding.md"),
          },
        },
        ".container880": {
          maxWidth: "960px",
          marginLeft: "auto",
          marginRight: "auto",
          paddingLeft: theme("container.padding.DEFAULT"),
          paddingRight: theme("container.padding.DEFAULT"),
          "@screen md": {
            paddingLeft: theme("container.padding.md"),
            paddingRight: theme("container.padding.md"),
          },
        },
        ".container800": {
          maxWidth: "880px",
          marginLeft: "auto",
          marginRight: "auto",
          paddingLeft: theme("container.padding.DEFAULT"),
          paddingRight: theme("container.padding.DEFAULT"),
          "@screen md": {
            paddingLeft: theme("container.padding.md"),
            paddingRight: theme("container.padding.md"),
          },
        },
        ".container720": {
          maxWidth: "800px",
          marginLeft: "auto",
          marginRight: "auto",
          paddingLeft: theme("container.padding.DEFAULT"),
          paddingRight: theme("container.padding.DEFAULT"),
          "@screen md": {
            paddingLeft: theme("container.padding.md"),
            paddingRight: theme("container.padding.md"),
          },
        },
        ".container700": {
          maxWidth: "780px",
          marginLeft: "auto",
          marginRight: "auto",
          paddingLeft: theme("container.padding.DEFAULT"),
          paddingRight: theme("container.padding.DEFAULT"),
          "@screen md": {
            paddingLeft: theme("container.padding.md"),
            paddingRight: theme("container.padding.md"),
          },
        },
        ".container640": {
          maxWidth: "720px",
          marginLeft: "auto",
          marginRight: "auto",
          paddingLeft: theme("container.padding.DEFAULT"),
          paddingRight: theme("container.padding.DEFAULT"),
          "@screen md": {
            paddingLeft: theme("container.padding.md"),
            paddingRight: theme("container.padding.md"),
          },
        },
      });
    }),
    function ({ matchUtilities, theme }) {
      matchUtilities(
        {
          "bg-custom-blue-gradient": (value) => ({
            backgroundImage: `linear-gradient(${value}, var(--blue-bg-gradient-color01) 0%, var(--blue-bg-gradient-color02) 100%)`,
          }),
        },
        { values: { DEFAULT: "90deg" } }
      );
    },
  ],
};

function withOpacityValue(variable) {
  return ({ opacityValue }) => {
    if (opacityValue === undefined) {
      return `rgb(var(${variable}))`;
    }
    return `rgb(var(${variable}) / ${opacityValue})`;
  };
}
