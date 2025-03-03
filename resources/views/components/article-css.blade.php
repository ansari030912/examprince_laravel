<style>
    /* Blog Content Styling */
    .article {
        font-family: "Inter", sans-serif;
        /* Primary font */
    }

    /* Headings (unchanged from your snippet) */
    .article h1,
    .article h2,
    .article h3 {
        margin-bottom: 1rem;
        color: #374151;
        font-weight: 700;
        font-family: "Inter", sans-serif;
    }
    .article h1 {
        font-size: 1.875rem; /* text-3xl */
        line-height: 2rem;  /* leading-tight */
    }
    .article h2 {
        font-size: 1.5rem; /* text-2xl */
        line-height: 1.75rem;
        margin-top: 20px;
    }
    .article h3 {
        font-size: 1.25rem; /* text-xl */
        line-height: 1.5rem;
        margin-top: 20px;
    }

    /* Paragraphs:
       - Increase bottom margin so each <p> starts clearly on a new line.
    */
    .article p {
        margin-bottom: 1.5rem;
        font-size: 1.125rem; /* text-lg */
        line-height: 1.75rem;
        color: #6b7280;
        font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
            "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    /* Lists:
       - Add margin-left to replicate Tailwind "ml-4" (1rem).
    */
    .article ul,
    .article ol {
        margin-bottom: 1.5rem;
        margin-left: 1rem; /* Similar to ml-4 in Tailwind */
        color: #999da3;
        font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
            "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }
    .article ul {
        list-style-type: disc;
    }
    .article ol {
        list-style-type: decimal;
    }
    .article li {
        margin-bottom: 0.75rem;
        font-size: 1.125rem; /* text-lg */
        line-height: 1.75rem;
    }

    /* Links:
       - Make links green (#10B981) and underlined.
    */
    .article a {
        color: #10B981; /* Tailwind green-500 */
        text-decoration: underline;
        font-weight: 500;
        font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
            "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }
    .article a:hover {
        color: #059669; /* Tailwind green-600 */
        text-decoration: underline;
    }

    /* Blockquotes */
    .article blockquote {
        margin: 1.5rem 0;
        padding: 1rem 1.5rem;
        border-left: 4px solid #22c55e;
        background-color: #f9fafb;
        font-size: 1.125rem; /* text-lg */
        color: #374151;
        font-style: italic;
        font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
            "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    /* Optional border styling for sub-headings */
    .article .border-b {
        border-bottom: 1px solid #e5e7eb;
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
    }

    /* Images inside content */
    .article img {
        max-width: 100%;
        margin: 1.5rem 0;
        border-radius: 0.5rem;
    }
</style>
